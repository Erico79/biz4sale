<?php

namespace App\Http\Controllers;

use App\DataTables\MasterFileDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMasterFileRequest;
use App\Http\Requests\UpdateMasterFileRequest;
use App\Mail\UserCredentials;
use App\Models\MasterFile;
use App\Repositories\MasterFileRepository;
use App\Role;
use App\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Response;

class MasterFileController extends AppBaseController
{
    /** @var  MasterFileRepository */
    private $masterFileRepository;
    const adminRole = "SYSADMIN";

    public function __construct(MasterFileRepository $masterFileRepo)
    {
        $this->masterFileRepository = $masterFileRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the MasterFile.
     *
     * @param MasterFileDataTable $masterFileDataTable
     * @return Response
     */

    public function isAdmin(){
        $role = Role::find(Auth::user()->role_id);
        if($role->code == self::adminRole){
            return true;
        }else{
            return false;
        }
    }
    public function index(MasterFileDataTable $masterFileDataTable)
    {
        $role = Role::find(Auth::user()->role_id);
//        var_dump($role);die;
        if($role->code == self::adminRole){
            $roles = Role::all();
        }else{
            $roles = Role::where('code','<>',self::adminRole)->get();
        }
//        print_r($roles);die;
        return $masterFileDataTable->render('master_files.index',[
            'roles'=>$roles
        ]);
    }

    /**
     * Show the form for creating a new MasterFile.
     *
     * @return Response
     */
    public function create()
    {
        return view('master_files.create',[
            'roles'=>Role::all()
        ]);
    }

    /**
     * Store a newly created MasterFile in storage.
     *
     * @param CreateMasterFileRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterFileRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->masterfile_id;
//        print_r($input);die();
        try{
            DB::transaction(function () use($request,$input){
                $masterFile = $this->masterFileRepository->create($input);
//        validator()->getMessageBag()->add("")
               $user = User::create([
                    'name'=> $request->firstname." ".$request->surname,
                    'email' =>$request->email,
                    'password'=>bcrypt('123456'),
                    'masterfile_id'=> $masterFile->id,
                    'role_id'=>$request->role_id,
                    'email_confirmed'=>false,
                    'password_changed'=>false
                ]);

//               Mail::to($user)
//                   ->send(new UserCredentials($user));
            });
            Flash::success('Master File saved successfully.');
        }catch (QueryException $e){
//            $request->getValidatorInstance()->getMessageBag()->add("error",$e->errorInfo[2]);
            $validator = Validator::make($request->all(), [

            ]);
            $messages = $validator->errors();
            $messages->add("",$e->errorInfo[2]);
                return redirect()->back()->withErrors($messages)->withInput();
        }


        //send email with user credentials and link to the system



        return redirect(route('masterFiles.index'));
    }

    /**
     * Display the specified MasterFile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
//        $masterFile = $this->masterFileRepository->findWithoutFail($id);
        $masterFile = MasterFile::where('id',$id)->with('user')->first();

//        if (empty($masterFile)) {
//            Flash::error('Master File not found');
//
//            return redirect(route('masterFiles.index'));
//        }
//
//        return view('master_files.show')->with('masterFile', $masterFile);
        return response()->json($masterFile);
    }

    /**
     * Show the form for editing the specified MasterFile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterFile = $this->masterFileRepository->findWithoutFail($id);

        if (empty($masterFile)) {
            Flash::error('Master File not found');

            return redirect(route('masterFiles.index'));
        }

        return view('master_files.edit')->with('masterFile', $masterFile);
    }

    /**
     * Update the specified MasterFile in storage.
     *
     * @param  int              $id
     * @param UpdateMasterFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterFileRequest $request)
    {
        $masterFile = $this->masterFileRepository->findWithoutFail($id);

        if (empty($masterFile)) {
            Flash::error('Master File not found');

            return redirect(route('masterFiles.index'));
        }

        $masterFile = $this->masterFileRepository->update($request->all(), $id);
        $user = User::where('masterfile_id',$id)->first();
        $user->name = $request->firstname ." ". $request->surname;
        $user->save();

        Flash::success('Master File updated successfully.');

        return redirect(route('masterFiles.index'));
    }

    /**
     * Remove the specified MasterFile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterFile = $this->masterFileRepository->findWithoutFail($id);

        if (empty($masterFile)) {
            Flash::error('Master File not found');

            return redirect(route('masterFiles.index'));
        }

        $this->masterFileRepository->delete($id);

        Flash::success('Master File deleted successfully.');

        return redirect(route('masterFiles.index'));
    }
}
