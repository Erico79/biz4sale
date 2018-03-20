<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(MasterfilesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(PropertyAskingPricesTableSeeder::class);
         $this->call(PropertySalesRevenueTableSeeder::class);
         $this->call(PropertyCashFlowPricesTableSeeder::class);
    }
}
