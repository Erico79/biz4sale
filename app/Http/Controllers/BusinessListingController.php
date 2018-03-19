<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessListingController extends Controller
{
    public function index() {
        return view('listings.index');
    }
}
