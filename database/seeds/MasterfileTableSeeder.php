<?php

use Illuminate\Database\Seeder;
use App\Masterfile;

class MasterfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Masterfile::truncate();
        Masterfile::create([
            'surname' => 'Admin',
            'firstname' => 'Admin',
            'middlename' => 'Admin',
            'gender' => 'Male',
            'national_id' => '12345678',
            'phone_number'=>'0700000000'
        ]);
    }
}
