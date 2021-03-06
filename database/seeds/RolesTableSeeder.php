<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin', 'code' => 'ADMIN']);
        Role::create(['name' => 'Seller', 'code' => 'SELLER']);
        Role::create(['name' => 'Buyer', 'code' => 'BUYER']);
    }
}
