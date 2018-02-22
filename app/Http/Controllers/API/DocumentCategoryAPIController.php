<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocumentCategoryAPIRequest;
use App\Http\Requests\API\UpdateDocumentCategoryAPIRequest;
use App\Models\DocumentCategory;
use App\Models\IndividualMessage;
use App\Repositories\DocumentCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocumentCategoryController
 * @package App\Http\Controllers\API
 */

class DocumentCategoryAPIController extends AppBaseController
{
    /** @var  DocumentCategoryRepository */
    private $documentCategoryRepository;

    public function __construct(DocumentCategoryRepository $documentCategoryRepo)
    {
        $this->documentCategoryRepository = $documentCategoryRepo;
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the DocumentCategory.
     * GET|HEAD /documentCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->documentCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
//        $documentCategories = $this->documentCategoryRepository->query()->all();
        $documentCategories = DocumentCategory::query()
//            ->union()
            ->get();


        return $this->sendResponse($documentCategories->toArray(), 'Document Categories retrieved successfully');
    }

    public function categoryDocuments(Request $request)
    {
        $this->documentCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->documentCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $documentCategories = $this->documentCategoryRepository->all();

        return $this->sendResponse($documentCategories->toArray(), 'Document Categories retrieved successfully');
    }


    public function getCats(Request $request){
        $documentCategories = DocumentCategory::query()
//            ->union()
            ->get();
        $docs = IndividualMessage::query()
            ->select('read','document_category','document_id','received')
            ->leftJoin('users','broadcast_individual_messages.masterfile_id', '=','users.masterfile_id')
            ->leftJoin('documents','documents.id', '=','broadcast_individual_messages.document_id')
//            ->leftJoin('document_categories','documents.document_category', '=','document_categories.id')

            ->where('users.id',$request->user()->id)
            ->get();
        if(!empty($documentCategories)) {
            foreach ($documentCategories as $category) {
               $category['unread'] = count($docs
//                    ->where(['document_category',$category->id]/*,['read'=>false]*/)
               ->where('document_category',$category->id)
                   ->where('read',false)
               );
            }
        }
        return $this->sendResponse($documentCategories,"success");
    }

    public function getRootCategories(){
        $rootCats = DocumentCategory::where('root_category',null)->get();
        return $this->sendResponse($rootCats,"success");
    }

    public function getCatsByRoot(Request $request,$id){
        $documentCategories = DocumentCategory::query()
                        ->where('root_category',$id)
//            ->union()
            ->get();
        $docs = IndividualMessage::query()
            ->select('read','document_category','document_id','received')
            ->leftJoin('users','broadcast_individual_messages.masterfile_id', '=','users.masterfile_id')
            ->leftJoin('documents','documents.id', '=','broadcast_individual_messages.document_id')
//            ->leftJoin('document_categories','documents.document_category', '=','document_categories.id')

            ->where('users.id',$request->user()->id)

            ->get();
        if(!empty($documentCategories)) {
            foreach ($documentCategories as $category) {
                $category['unread'] = count($docs
//                    ->where(['document_category',$category->id]/*,['read'=>false]*/)
                    ->where('document_category',$category->id)
                    ->where('read',false)
                );
            }
        }
        return $this->sendResponse($documentCategories,"success");
    }

}
