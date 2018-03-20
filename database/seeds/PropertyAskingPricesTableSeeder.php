<?php

use Illuminate\Database\Seeder;
use App\PropertyAskingPrice;

class PropertyAskingPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyAskingPrice::create(['price_range' => 'Under $100k']);
        PropertyAskingPrice::create(['price_range' => '$100k - $250k']);
        PropertyAskingPrice::create(['price_range' => '$250k - $500k']);
        PropertyAskingPrice::create(['price_range' => '$500k - $1m']);
        PropertyAskingPrice::create(['price_range' => '$1m - $5m']);
        PropertyAskingPrice::create(['price_range' => 'Over $5m']);
        PropertyAskingPrice::create(['price_range' => 'Undisclosed']);
    }
}
