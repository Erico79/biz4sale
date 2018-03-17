<?php

use Illuminate\Database\Seeder;
use App\Masterfile;

class MasterfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Masterfile::create([
            'first_name' => 'David',
            'last_name' => 'Munyua',
            'phone_no' => '254720254253',
            'b_role' => 'Admin'
        ]);
    }
}
