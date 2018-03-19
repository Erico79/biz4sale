<?php

namespace App\Http\Controllers;

use App\Masterfile;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class SellerRegistrationController extends Controller
{
    public function store() {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone_no' => 'required|unique:masterfiles|min:10|max:10',
            'password' => 'required|confirmed'
        ]);

        $mf = Masterfile::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'phone_no' => request('phone_no'),
            'b_role' => Role::Seller
        ]);

        $random_pass = rand(100000, 999999);

        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt($random_pass),
            'role_id' => Role::seller()->id,
            'status' => 1,
            'masterfile_id' => $mf->id
        ]);

        // event for seller registration

        auth()->login($user);

        request()->session()->flash('success', 'You have been successfully registered.');
        return redirect()->route('upload-business');
    }

    public function emailVerification(Request $request) {
        $user = $request->user();
        return view('seller.email-verification')->with('email', $user->email);
    }

    public function phoneVerification(Request $request) {
        $phone_no = $request->user()->masterfile->phone_no;
        return view('seller.phone-verification')->with('phone', $phone_no);
    }
}
