<?php

use Illuminate\Database\Seeder;
use App\Models\Committee;
use App\Masterfile;

class CommitteeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Masterfile::where('national_id', '12345678')->first();
        Committee::create(['name' => 'Test Committee', 'created_by' => $admin->id]);
    }
}
