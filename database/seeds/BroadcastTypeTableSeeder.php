<?php

use Illuminate\Database\Seeder;
use App\BroadcastType;

class BroadcastTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BroadcastType::create(['name' => 'Committees', 'code' => 'COM']);
        BroadcastType::create(['name' => 'Specific', 'code' => 'SPEC']);
    }
}
