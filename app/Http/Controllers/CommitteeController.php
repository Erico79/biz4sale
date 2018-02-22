<?php

namespace App\Http\Controllers;

use App\DataTables\CommitteeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use App\Repositories\CommitteeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

use Response;

class CommitteeController extends AppBaseController
{
    /** @var  CommitteeRepository */
    private $committeeRepository;

    public function __construct(CommitteeRepository $committeeRepo)
    {
        $this->committeeRepository = $committeeRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Committee.
     *
     * @param CommitteeDataTable $committeeDataTable
     * @return Response
     */
    public function index(CommitteeDataTable $committeeDataTable)
    {
        $role = Role::where('code','MCA')->first();
        $members = User::select('masterfiles.id','surname','firstname','middlename')
            ->leftJoin('masterfiles','users.masterfile_id', '=','masterfiles.id')
            ->where('role_id','=',$role->id)->get();
        ;
        return $committeeDataTable->render('committees.index',[
            'members'=>$members
        ]);
    }

    /**
     * Show the form for creating a new Committee.
     *
     * @return Response
     */
    public function create()
    {
        return view('committees.create');
    }

    /**
     * Store a newly created Committee in storage.
     *
     * @param CreateCommitteeRequest $request
     *
     * @return Response
     */
    public function store(CreateCommitteeRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::id();

        $committee = $this->committeeRepository->create($input);

        Flash::success('Committee saved successfully.');

        return redirect(route('committees.index'));
    }

    /**
     * Display the specified Committee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $committee = $this->committeeRepository->findWithoutFail($id);

//        if (empty($committee)) {
//            Flash::error('Committee not found');
//
//            return redirect(route('committees.index'));
//        }
//
//        return view('committees.show')->with('committee', $committee);
        return response()->json($committee);
    }

    /**
     * Show the form for editing the specified Committee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $committee = $this->committeeRepository->findWithoutFail($id);

        if (empty($committee)) {
            Flash::error('Committee not found');

            return redirect(route('committees.index'));
        }

        return view('committees.edit')->with('committee', $committee);
    }

    /**
     * Update the specified Committee in storage.
     *
     * @param  int              $id
     * @param UpdateCommitteeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommitteeRequest $request)
    {
        $committee = $this->committeeRepository->findWithoutFail($id);

        if (empty($committee)) {
            Flash::error('Committee not found');

            return redirect(route('committees.index'));
        }

        $committee = $this->committeeRepository->update($request->all(), $id);

        Flash::success('Committee updated successfully.');

        return redirect(route('committees.index'));
    }

    /**
     * Remove the specified Committee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $committee = $this->committeeRepository->findWithoutFail($id);

        if (empty($committee)) {
            Flash::error('Committee not found');

            return redirect(route('committees.index'));
        }

        $this->committeeRepository->delete($id);

        Flash::success('Committee deleted successfully.');

        return redirect(route('committees.index'));
    }
}
