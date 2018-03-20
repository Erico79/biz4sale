<?php

use Illuminate\Database\Seeder;
use App\PropertyCashFlow;

class PropertyCashFlowPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyCashFlow::create(['price_range' => 'Under $50k']);
        PropertyCashFlow::create(['price_range' => '$50k - $250k']);
        PropertyCashFlow::create(['price_range' => '$250k - $500k']);
        PropertyCashFlow::create(['price_range' => '$500k - $2.5m']);
        PropertyCashFlow::create(['price_range' => 'Over $2.5m']);
        PropertyCashFlow::create(['price_range' => 'Undisclosed']);
        PropertyCashFlow::create(['price_range' => 'Not Applicable']);
    }
}
