<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerRegistrationController extends Controller
{
    public function store() {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone_no' => 'required|unique:masterfiles'
        ]);


    }
}
