<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    use ResetsPasswords;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $this->userRepository->pushCriteria(new LimitOffsetCriteria($request));
        $users = $this->userRepository->all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    public function getUser(Request $request){
        if($request->user()->password_changed){
            return $this->sendResponse($request->user(),"User details");
        }else{
            return $this->sendError("password not changed",200);
        }
//        return $request->user();
    }

    public function resetPassword(Request $request){
        $rules= [
            'password' => 'required|string|min:6|confirmed',
        ];
        $this->validate($request, $rules, $this->validationErrorMessages());

        $user = User::find($request->user()->id);
        $user->password = Hash::make($request->password);



        try{
            $user->password_changed = true;
            $user->save();
            event(new PasswordReset($user));
            return $this->sendResponse($user,"password changed");
        }catch (\Exception $e){
         return $this->sendError("Failed to set password");
    }
    }
}
