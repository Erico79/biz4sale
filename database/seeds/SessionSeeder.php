<?php

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Session::create(['session_name'=>'Jan-Aug','description'=>'January to august']);
        \App\Models\Session::create(['session_name'=>'Sept-Dec','description'=>'September to Dec']);
    }
}
