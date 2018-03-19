<?php

namespace App\Http\Controllers;

use App\Masterfile;
use App\Mail\SellerEmailVerification;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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

        // send verification email
        Mail::to($user)->send(new SellerEmailVerification($user, Crypt::encryptString($user->id)));

        // autologin the seller
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

    public function verifyEmail($user_id) {
        $user_id = Crypt::decryptString($user_id);
        User::where('id', $user_id)->update(['email_verified' => 1]);

        // TODO send verification sms

        request()->session()->flash('success', 'You have confirmed your email successfully.');
        return redirect()->route('upload-business');
    }

    public function verifyPhoneNumber() {
        $post = request()->validate(['code', 'required|min:4|max:4']);

        if (session()->has('verification_code')) {
            if ($post['code'] == session('verification_code')) {
                request()->session()->flash('success', 'Your phone number has been verified successfully');
                session()->forget('verification_code');
            } else {
                request()->session()->flash('error', 'You have entered an invalid Verification Code!');
            }
        }

        return redirect()->route('upload-business');
    }

    public function resendVerificationEmail(Request $request) {
        $user = $request->user();
        Mail::to($user)->send(new SellerEmailVerification($user, Crypt::encryptString($user->id)));
        return redirect()->route('upload-business');
    }
}
