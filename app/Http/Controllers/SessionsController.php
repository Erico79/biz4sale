<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function login() {
        $post = request()->validate(['email' => 'required', 'password' => 'required']);

        if (auth()->attempt($post)) {
            // TODO // redirect the user according to his role
        } else {
            request()->session()->flash('info', 'You have entered invalid credentials.');
        }

        return redirect('/');
    }
}
