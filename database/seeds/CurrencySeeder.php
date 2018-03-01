<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Currency::truncate();
        \App\Currency::create([
            'name'=>"Kenyan Shillings",
            'initials'=>"Ksh",
            "country" => 1
        ]);
        \App\Currency::create([
            'name'=>"US Dollar",
            'initials'=>"$",
            "country" => 1
        ]);
    }
}
