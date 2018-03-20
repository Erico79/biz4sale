<?php

use Illuminate\Database\Seeder;
use App\PropertySalesRevenue;

class PropertySalesRevenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertySalesRevenue::create(['price_range' => 'Under $100k']);
        PropertySalesRevenue::create(['price_range' => '$100k - $250k']);
        PropertySalesRevenue::create(['price_range' => '$250k - $500k']);
        PropertySalesRevenue::create(['price_range' => '$500k - $1m']);
        PropertySalesRevenue::create(['price_range' => '$1m - $5m']);
        PropertySalesRevenue::create(['price_range' => 'Over $5m']);
        PropertySalesRevenue::create(['price_range' => 'Undisclosed']);
        PropertySalesRevenue::create(['price_range' => 'Not Applicable']);
    }
}
