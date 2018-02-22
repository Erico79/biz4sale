<?php

use Illuminate\Database\Seeder;
use App\CommitteeDocCategory;

class CommitteeDocsCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommitteeDocCategory::create(['name'=>'Agenda','code'=>'AGENDA']);
        CommitteeDocCategory::create(['name'=>'Minutes','code'=>'MINUTES']);
        CommitteeDocCategory::create(['name'=>'Reports','code'=>'REPORTS']);
        CommitteeDocCategory::create(['name'=>'Documents','code'=>'DOCUMENTS']);
    }
}
