<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use \Illuminate\Support\Facades\Validator;

class PassportAPIController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' =>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);

    }
}
