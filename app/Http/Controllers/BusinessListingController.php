<?php

namespace App\Http\Controllers;

use App\PropertyAskingPrice;
use Illuminate\Http\Request;

class BusinessListingController extends Controller
{
    public function index() {
        $prop_asking_prices = PropertyAskingPrice::all();

        return view('listings.index')->with([
            'prop_asking_prices' => $prop_asking_prices
        ]);
    }
}
