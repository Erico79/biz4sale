<?php

use Illuminate\Database\Seeder;

class PlenarySittingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PlenarySitting::create([
            'sitting_name'=>"AM", 'description'=>'Morning hours'
        ]);
        \App\Models\PlenarySitting::create([
            'sitting_name'=>"PM", 'description'=> 'Afternoon hours'
        ]);
    }
}
