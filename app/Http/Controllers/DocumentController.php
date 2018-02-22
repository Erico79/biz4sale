<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Broadcast;
use App\Models\DocumentCategory;
use App\Models\IndividualMessage;
use App\Models\PlenarySitting;
use App\Models\Role;
use App\Models\Session;
use App\Models\User;
use App\NotificationType;
use App\Repositories\DocumentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class DocumentController extends AppBaseController
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Document.
     *
     * @param DocumentDataTable $documentDataTable
     * @return Response
     */
    public function index(DocumentDataTable $documentDataTable)
    {

        return $documentDataTable->render('documents.index',[
            'document_categories'=>DocumentCategory::all(),
            'sessions'=>Session::all(),
            'user_groups'=>Role::all(),
            'sittings'=> PlenarySitting::all()
        ]);
    }

    /**
     * Show the form for creating a new Document.
     *
     * @return Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created Document in storage.
     *
     * @param CreateDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentRequest $request)
    {
        $input = $request->all();
        $doc_category = DocumentCategory::find($request->document_category);
        if($request->hasFile('document_path')){
            $ext = $request->document_path->getClientOriginalExtension();
//            var_dump($ext)
            $path = $request->file('document_path')->storeAs('documents',$string = str_replace(' ', '-', $doc_category->category_name.'-'.Carbon::today()->toDateString()).'-'.Carbon::now()->timestamp.'.'.$ext);
//            var_dump($path);die();
//            $path = $request->file('document_path')->store('documents');
            $input['document_path'] = asset('storage/'.$path);
        }
//        print_r($input);die();
        DB::transaction(function() use($input, $request,$doc_category){
            $document = $this->documentRepository->create($input);
            $broadcast = Broadcast::create([
                'user_group'=> $request->user_group,
                'message'=>'A new '. str_singular($doc_category->category_name).' has been added',
                'broadcast_type'=>NotificationType::where('code','push')->first()->id,

            ]);
            // get the users to send broadcasts to
            $users = User::where('role_id',$request->user_group)->get();
            if(count($users)) {
                foreach ($users as $user) {
                    IndividualMessage::create([
                        'masterfile_id' => $user->masterfile_id,
                        'document_id' => $document->id,
                        'document_type'=>"house_business",
                        'broadcast_id' => $broadcast->id,
                        'broadcast_type' => NotificationType::where('code', 'push')->first()->id
                    ]);
                }
            }


            Flash::success('Document saved successfully.');

        });



        return redirect(route('documents.index'));
    }

    /**
     * Display the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function fileDownload(\Illuminate\Http\Request $request){

//        var_dump($request->path);die();
        $path = explode('public/',$request->path);
        return response()->download($path[1]);
    }
    public function edit($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('documents.edit')->with('document', $document);
    }

    /**
     * Update the specified Document in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $document = $this->documentRepository->update($request->all(), $id);

        Flash::success('Document updated successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $this->documentRepository->delete($id);
        $path = explode('storage/',$document->document_path);
//        var_dump($path);die();
        Storage::delete($path[1]);

        Flash::success('Document deleted successfully.');

        return redirect(route('documents.index'));
    }
}
