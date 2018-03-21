<?php

namespace App\Http\Controllers;

use App\PropertyAskingPrice;
use App\PropertyCashFlow;
use App\PropertySalesRevenue;
use Illuminate\Http\Request;

class BusinessListingController extends Controller
{
    public function index() {
        $prop_asking_prices = PropertyAskingPrice::all();
        $prop_sales_prices = PropertySalesRevenue::all();
        $prop_cash_prices = PropertyCashFlow::all();

        return view('listings.index')->with([
            'prop_asking_prices' => $prop_asking_prices,
            'prop_sales_prices' => $prop_sales_prices,
            'prop_cash_prices' => $prop_cash_prices
        ]);
    }
}
