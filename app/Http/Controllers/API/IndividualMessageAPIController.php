<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIndividualMessageAPIRequest;
use App\Http\Requests\API\UpdateIndividualMessageAPIRequest;
use App\Models\IndividualMessage;
use App\Repositories\IndividualMessageRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IndividualMessageController
 * @package App\Http\Controllers\API
 */

class IndividualMessageAPIController extends AppBaseController
{
    /** @var  IndividualMessageRepository */
    private $individualMessageRepository;

    public function __construct(IndividualMessageRepository $individualMessageRepo)
    {
        $this->individualMessageRepository = $individualMessageRepo;
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the IndividualMessage.
     * GET|HEAD /individualMessages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->individualMessageRepository->pushCriteria(new RequestCriteria($request));
        $this->individualMessageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $individualMessages = $this->individualMessageRepository->all();

        return $this->sendResponse($individualMessages->toArray(), 'Individual Messages retrieved successfully');
    }


    public function show($id)
    {
        /** @var IndividualMessage $individualMessage */
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            return $this->sendError('Individual Message not found');
        }

        return $this->sendResponse($individualMessage->toArray(), 'Individual Message retrieved successfully');
    }
    public function getNotifications(){
        $notifications = IndividualMessage::query()
            ->select(['users.id as userId','broadcasts.message','documents.document_path',
                'broadcast_individual_messages.id as notificationId',
                'broadcast_individual_messages.received',
                'sessions.session_name',
                'document_categories.category_name as document_type',
                'documents.upload_date'
            ])
            ->leftJoin('users','broadcast_individual_messages.masterfile_id', '=','users.masterfile_id')
            ->leftJoin('documents','documents.id', '=','broadcast_individual_messages.document_id')
            ->leftJoin('broadcasts','broadcasts.id', '=','broadcast_individual_messages.broadcast_id')
            ->leftJoin('sessions','documents.session_id', '=','sessions.id')
            ->leftJoin('document_categories','documents.document_category', '=','document_categories.id')
            ->where([
                ['users.id',Auth::id()],['received',false]
            ])
            ->get();
//        print_r($notifications);
        if (count($notifications) == 0) {
            return $this->sendResponse([],'No documents found');
        }
        return $this->sendResponse($notifications->toArray(), 'Document retrieved successfully');

    }

    public function fileDownload($path){
        return response()->file($path);
    }

    public function updateNotification($id){
//        $notification = IndividualMessage::find($id);
//        $notification->received = true;
//        $notification->save();
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);
        $input["received"] = true;
        if (empty($individualMessage)) {
            return $this->sendError('Notification not found');
        }

        $individualMessage = $this->individualMessageRepository->update($input, $id);

        return $this->sendResponse($individualMessage->toArray(), 'Notification updated successfully');
    }
    public function update($id, UpdateIndividualMessageAPIRequest $request)
    {
        $input = $request->all();

        /** @var IndividualMessage $individualMessage */
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            return $this->sendError('Individual Message not found');
        }

        $individualMessage = $this->individualMessageRepository->update($input, $id);

        return $this->sendResponse($individualMessage->toArray(), 'IndividualMessage updated successfully');
    }

    public function getCatDocs(Request $request){
        $this->validate($request,[
            'document_category'=>'required',
//            'date'=>'required'
        ]);
        $documents = IndividualMessage::query()
            ->select(['users.id as userId','broadcasts.message','documents.document_path',
                'broadcast_individual_messages.id as notificationId',
                'broadcast_individual_messages.received',
                'sessions.session_name',
                'document_categories.category_name as document_type',
                'documents.upload_date','read'
            ])
            ->leftJoin('users','broadcast_individual_messages.masterfile_id', '=','users.masterfile_id')
            ->leftJoin('documents','documents.id', '=','broadcast_individual_messages.document_id')
            ->leftJoin('broadcasts','broadcasts.id', '=','broadcast_individual_messages.broadcast_id')
            ->leftJoin('sessions','documents.session_id', '=','sessions.id')
            ->leftJoin('document_categories','documents.document_category', '=','document_categories.id')
            ->where([
                ['users.id',$request->user()->id],['document_category',$request->document_category]
            ])->orderByDesc('notificationId')
            ->take(10)
            ->get();
        return $this->sendResponse($documents,"documents retrieved");
//        return $date;

    }
    public function getCatDocByDate(Request $request){
        $this->validate($request,[
            'document_category'=>'required',
            'date'=>'required'
        ]);
        $date =Carbon::createFromFormat('Y/m/d',$request->date)->toDateString();
        $documents = IndividualMessage::query()
            ->select(['users.id as userId','broadcasts.message','documents.document_path',
                'broadcast_individual_messages.id as notificationId',
                'broadcast_individual_messages.received',
                'sessions.session_name',
                'document_categories.category_name as document_type',
                'documents.upload_date'
            ])
            ->leftJoin('users','broadcast_individual_messages.masterfile_id', '=','users.masterfile_id')
            ->leftJoin('documents','documents.id', '=','broadcast_individual_messages.document_id')
            ->leftJoin('broadcasts','broadcasts.id', '=','broadcast_individual_messages.broadcast_id')
            ->leftJoin('sessions','documents.session_id', '=','sessions.id')
            ->leftJoin('document_categories','documents.document_category', '=','document_categories.id')
            ->where([
                ['users.id',Auth::id()],['document_category',$request->document_category],
                ['upload_date',$date]
            ])->orderByDesc('notificationId')
//            ->take(10)
            ->get();
        return $this->sendResponse($documents,"documents retrieved");
//        return $date;
    }

    public function markAsRead(Request $request){
        $this->validate($request,[
            'notification_id'=>'required'
        ]);
        $notification = $this->individualMessageRepository->findWithoutFail($request->notification_id);

        if (empty($notification)) {
            return $this->sendError('notification not found',200);
        }
        $input['read'] =1;
        $notification = $this->individualMessageRepository->update($input, $request->notification_id);
            return $this->sendResponse($notification,'notification marked as read');
    }


}
