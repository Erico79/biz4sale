<?php

namespace App\Http\Controllers\API;

use App\CommitteeDocCategory;
use App\Http\Requests\API\CreateCommitteeAPIRequest;
use App\Http\Requests\API\UpdateCommitteeAPIRequest;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\IndividualMessage;
use App\Repositories\CommitteeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CommitteeController
 * @package App\Http\Controllers\API
 */

class CommitteeAPIController extends AppBaseController
{
    /** @var  CommitteeRepository */
    private $committeeRepository;

    public function __construct(CommitteeRepository $committeeRepo)
    {
        $this->committeeRepository = $committeeRepo;
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $this->committeeRepository->pushCriteria(new RequestCriteria($request));
        $this->committeeRepository->pushCriteria(new LimitOffsetCriteria($request));

        //get committees that a member is attached to
        $committees = CommitteeMember::query()
            ->select(['committees.id','committees.name'])
            ->leftJoin('committees','committees.id','=','committee_members.committee_id')
//            ->leftJoin('broadcast_individual_messages')
            ->where('committee_members.masterfile_id',$request->user()->id)
            ->get()
        ;
        if(count($committees)){
            foreach ($committees as $committee){
                $individual_message = IndividualMessage::query()
                    ->select("broadcast_individual_messages.id")
                    ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
                    ->where('committee_documents.committee',$committee->id)
                    ->where('broadcast_individual_messages.read',false)
                    ->where('broadcast_individual_messages.masterfile_id',$request->user()->id)
                    ->get();
                $committee["unread"] = count($individual_message);
            }
        }
        return $this->sendResponse($committees, 'Committees retrieved successfully');
    }

    public function committeeDocumentCategories(Request $request){
        $committeeDocCats = CommitteeDocCategory::all();
        if(count($committeeDocCats)){
            foreach ($committeeDocCats as $cat){
                $individual_message = IndividualMessage::query()
                    ->select("broadcast_individual_messages.id")
                    ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
                    ->where('committee_documents.committee_doc_category',$cat->id)
                    ->where('broadcast_individual_messages.read',false)
                    ->where('broadcast_individual_messages.masterfile_id',$request->user()->id)
                    ->get();
                $cat["unread"] = count($individual_message);
            }
        }
        return $this->sendResponse($committeeDocCats, 'Committee document categories retrieved');
    }

    //get committee documents belonging to a certain category
    public function getCommitteeDocsByCat(Request $request){
        $this->validate($request,[
            'committee_id'=>'required',
            'category_id'=>'required'
        ]);
        $documents = IndividualMessage::query()
        ->select(['*','broadcast_individual_messages.id as notification_id'])
            ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
            ->where([
                ['broadcast_individual_messages.document_type','=','committee_document'],
                ['committee_documents.committee_doc_category','=',$request->category_id],
                ['committee_documents.committee',$request->committee_id],
                ['broadcast_individual_messages.masterfile_id',$request->user()->id]
            ])
            ->get();

        return $this->sendResponse($documents,"Documents retrieved");
    }

    //get all committee unread documents for logged in user

    public function allUnreadCommitteeDocs(Request $request){
        if(isset($request->committee_id)&& isset($request->category_id)){
            $docs = IndividualMessage::query()
                ->select(['broadcast_individual_messages.id'])
                ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
                ->where([
                    ['broadcast_individual_messages.document_type','=','committee_document'],
                    ['committee_documents.committee_doc_category','=',$request->category_id],
                    ['committee_documents.committee',$request->committee_id],
                    ['broadcast_individual_messages.masterfile_id',$request->user()->id],
                    ['broadcast_individual_messages.read',false]
                ])
                ->get();
            $message = "all unread document for committee ".$request->committee_id." and category ".$request->category_id;
        }elseif (isset($request->committee_id)){
            $docs = IndividualMessage::query()
                ->select(['broadcast_individual_messages.id'])
                ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
                ->where([
                    ['broadcast_individual_messages.document_type','=','committee_document'],
//                    ['committee_documents.committee_doc_category','=',$request->category_id],
                    ['committee_documents.committee',$request->committee_id],
                    ['broadcast_individual_messages.masterfile_id',$request->user()->id],
                    ['broadcast_individual_messages.read',false]
                ])
                ->get();
            $message = "all unread committee documents for committee ".$request->committee_id;
        }else{
            $docs = IndividualMessage::query()
                ->select(['broadcast_individual_messages.id'])
                ->leftJoin('committee_documents','committee_documents.id','=','broadcast_individual_messages.committee_document_id')
                ->where([
                    ['broadcast_individual_messages.document_type','=','committee_document'],
//                    ['committee_documents.committee_doc_category','=',$request->category_id],
//                    ['committee_documents.committee',$request->committee_id],
                    ['broadcast_individual_messages.masterfile_id',$request->user()->id],
                    ['broadcast_individual_messages.read',false]
                ])
                ->get();
            $message = "all unread committee documents";
        }

        return $this->sendResponse(count($docs),$message);
    }





}
