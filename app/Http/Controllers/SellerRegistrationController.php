<?php

namespace App\Http\Controllers;

use App\Masterfile;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class SellerRegistrationController extends Controller
{
    public function store() {
        $post = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone_no' => 'required|unique:masterfiles'
        ]);

        $mf = Masterfile::create($post);

        $random_pass = random(100000, 999999);

        User::create([
            'email' => request('email'),
            'password' => bcrypt($random_pass),
            'role_id' => Role::seller()->id,
            'status' => 1,
            'masterfile_id' => $mf->id
        ]);

        // event for seller registration

        request()->session()->flash('success', 'You have been successfully registered');
        return redirect()->route('upload-business');
    }
}
