<?php

namespace App\Http\Controllers;

use App\DataTables\CommitteeMemberDataTable;
use App\Masterfile;
use Doctrine\DBAL\Query\QueryException;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCommitteeMemberRequest;
use App\Http\Requests\UpdateCommitteeMemberRequest;
use App\Repositories\CommitteeMemberRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\CommitteeMember;
use Yajra\DataTables\DataTables;

class CommitteeMemberController extends AppBaseController
{
    /** @var  CommitteeMemberRepository */
    private $committeeMemberRepository;

    public function __construct(CommitteeMemberRepository $committeeMemberRepo)
    {
        $this->committeeMemberRepository = $committeeMemberRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the CommitteeMember.
     *
     * @param CommitteeMemberDataTable $committeeMemberDataTable
     * @return Response
     */
    public function index(CommitteeMemberDataTable $committeeMemberDataTable)
    {
        return $committeeMemberDataTable->render('committee_members.index');
    }

    public function getCommitteeMembers($id){
        $members = CommitteeMember::where('committee_id',$id)->get();
//        var_dump($members);
        return DataTables::of($members)
        ->editColumn('masterfile_id',function (CommitteeMember $committeeMember){
            $masterfile = Masterfile::find($committeeMember->masterfile_id);
            return $masterfile->surname.' '.$masterfile->firstname.' '.$masterfile->middlename;
        })
            ->editColumn('id',function(CommitteeMember $committeeMember){
                return '<button data-toggle="modal" href="#delete-m-modal" action="'.url("committeeMembers/".$committeeMember->id).'" class="btn btn-xs btn-danger remove-member">remove</button>';
            })
            ->rawColumns(['id'])
            ->make(true);
    }

    /**
     * Show the form for creating a new CommitteeMember.
     *
     * @return Response
     */
    public function create()
    {
        return view('committee_members.create');
    }

    /**
     * Store a newly created CommitteeMember in storage.
     *
     * @param CreateCommitteeMemberRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
//            var_dump($request->members);die();
//        $input = $request->all();
        if(count($request->members)){
            foreach ($request->members as $member){
                $in = [];
                $in["committee_id"] = $request->committee;
                $in["masterfile_id"] = $member;
//                var_dump($in);die();
                $mem = CommitteeMember::where([
                    ['committee_id','=',$request->committee],
                    ['masterfile_id','=',$member]
                ])->get();
//                var_dump($mem);die();
                if(!count($mem)){
                    $committeeMember = $this->committeeMemberRepository->create($in);
                }
            }

        }
//        var_dump($input);die();



//        Flash::success('Committee Member saved successfully.');

//        return redirect(route('committeeMembers.index'));
        return response()->json(["status"=>"success"]);
    }

    /**
     * Display the specified CommitteeMember.
     *
     * @param  int $id
     *
     * @return Response
     *
     *
     */
    public function show($id)
    {
        $committeeMember = $this->committeeMemberRepository->findWithoutFail($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        return view('committee_members.show')->with('committeeMember', $committeeMember);
    }

    /**
     * Show the form for editing the specified CommitteeMember.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $committeeMember = $this->committeeMemberRepository->findWithoutFail($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        return view('committee_members.edit')->with('committeeMember', $committeeMember);
    }

    /**
     * Update the specified CommitteeMember in storage.
     *
     * @param  int              $id
     * @param UpdateCommitteeMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommitteeMemberRequest $request)
    {
        $committeeMember = $this->committeeMemberRepository->findWithoutFail($id);

        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }

        $committeeMember = $this->committeeMemberRepository->update($request->all(), $id);

        Flash::success('Committee Member updated successfully.');

        return redirect(route('committeeMembers.index'));
    }

    /**
     * Remove the specified CommitteeMember from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $committeeMember = $this->committeeMemberRepository->findWithoutFail($id);
        $status ="success";
        if (empty($committeeMember)) {
            Flash::error('Committee Member not found');

            return redirect(route('committeeMembers.index'));
        }
        try{
            $this->committeeMemberRepository->delete($id);
        }catch (\Illuminate\Database\QueryException $e){
            $status = $e->errorInfo[2];
        }
//
//        Flash::success('Committee Member deleted successfully.');
//
//        return redirect(route('committeeMembers.index'));
        return response()->json($status);
    }
}
