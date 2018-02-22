<?php

namespace App\Http\Controllers;

use App\Broadcast;
use App\CommitteeDocCategory;
use App\DataTables\CommitteeDocumentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCommitteeDocumentRequest;
use App\Http\Requests\UpdateCommitteeDocumentRequest;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\IndividualMessage;
use App\Models\Session;
use App\NotificationType;
use App\Repositories\CommitteeDocumentRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class CommitteeDocumentController extends AppBaseController
{
    /** @var  CommitteeDocumentRepository */
    private $committeeDocumentRepository;

    public function __construct(CommitteeDocumentRepository $committeeDocumentRepo)
    {
        $this->middleware('auth');
        $this->committeeDocumentRepository = $committeeDocumentRepo;
    }

    /**
     * Display a listing of the CommitteeDocument.
     *
     * @param CommitteeDocumentDataTable $committeeDocumentDataTable
     * @return Response
     */
    public function index(CommitteeDocumentDataTable $committeeDocumentDataTable)
    {
        return $committeeDocumentDataTable->render('committee_documents.index',[
            'sessions'=>Session::all(),
            'committees'=>Committee::all(),
            'types'=>CommitteeDocCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new CommitteeDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('committee_documents.create');
    }

    /**
     * Store a newly created CommitteeDocument in storage.
     *
     * @param CreateCommitteeDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateCommitteeDocumentRequest $request)
    {
        $input = $request->all();

        $doc_category = CommitteeDocCategory::find($request->committee_doc_category);
        if($request->hasFile('document_path')){
            $ext = $request->document_path->getClientOriginalExtension();
//            var_dump($ext)
            $path = $request->file('document_path')->storeAs('documents',$string = str_replace(' ', '-', $doc_category->code.'-'.Carbon::today()->toDateString()).'-'.Carbon::now()->timestamp.'.'.$ext);
//            var_dump($path);die();
//            $path = $request->file('document_path')->store('documents');
            $input['document_path'] = asset('storage/'.$path);
        }
//        print_r($input);die();
        DB::transaction(function() use($input, $request,$doc_category){
            $document = $this->committeeDocumentRepository->create($input);
            $broadcast = Broadcast::create([
                'user_group'=> 3,
                'message'=>'A new committee document has been added',
                'broadcast_type'=>NotificationType::where('code','push')->first()->id,

            ]);
            // get the users to send broadcasts to
//            $users = User::where('role_id',$request->user_group)->get();
            $users = CommitteeMember::select('masterfile_id')
                ->where('committee_id','=',$request->committee)->get();
//            print_r($users);die();
            if(count($users)) {
                foreach ($users as $user) {
                    IndividualMessage::create([
                        'masterfile_id' => $user->masterfile_id,
                        'document_type'=>"committee_document",
                        'committee_document_id' => $document->id,
                        'broadcast_id' => $broadcast->id,
                        'broadcast_type' => NotificationType::where('code', 'push')->first()->id
                    ]);
                }
            }


            Flash::success('Document saved successfully.');

        });
        return redirect(route('committeeDocuments.index'));
    }

    /**
     * Display the specified CommitteeDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $committeeDocument = $this->committeeDocumentRepository->findWithoutFail($id);

        if (empty($committeeDocument)) {
            Flash::error('Committee Document not found');

            return redirect(route('committeeDocuments.index'));
        }

        return view('committee_documents.show')->with('committeeDocument', $committeeDocument);
    }

    /**
     * Show the form for editing the specified CommitteeDocument.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $committeeDocument = $this->committeeDocumentRepository->findWithoutFail($id);

        if (empty($committeeDocument)) {
            Flash::error('Committee Document not found');

            return redirect(route('committeeDocuments.index'));
        }

        return view('committee_documents.edit')->with('committeeDocument', $committeeDocument);
    }

    /**
     * Update the specified CommitteeDocument in storage.
     *
     * @param  int              $id
     * @param UpdateCommitteeDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommitteeDocumentRequest $request)
    {
        $committeeDocument = $this->committeeDocumentRepository->findWithoutFail($id);

        if (empty($committeeDocument)) {
            Flash::error('Committee Document not found');

            return redirect(route('committeeDocuments.index'));
        }

        $committeeDocument = $this->committeeDocumentRepository->update($request->all(), $id);

        Flash::success('Committee Document updated successfully.');

        return redirect(route('committeeDocuments.index'));
    }

    /**
     * Remove the specified CommitteeDocument from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $committeeDocument = $this->committeeDocumentRepository->findWithoutFail($id);

        if (empty($committeeDocument)) {
            Flash::error('Committee Document not found');

            return redirect(route('committeeDocuments.index'));
        }

        $this->committeeDocumentRepository->delete($id);

        Flash::success('Committee Document deleted successfully.');

        return redirect(route('committeeDocuments.index'));
    }
}
