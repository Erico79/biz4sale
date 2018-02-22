<?php

use Illuminate\Database\Seeder;

class FontAwesomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('fontawesomes')->truncate();
        \App\Fontawesome::create(['name'=>'bar-chart','value'=>'fa-bar-chart']);
        \App\Fontawesome::create(['name'=>'bar-chart','value'=>'fa-users']);
    }
}
