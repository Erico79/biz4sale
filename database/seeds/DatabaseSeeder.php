<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::transaction(function(){
            $this->call(MasterfileTableSeeder::class);
            $this->call(RoleTableSeeder::class);
            $this->call(UserTableSeeder::class);
            $this->call(RoutesTableSeeder::class);
//            $this->call(CommitteeTableSeeder::class);
//            $this->call(BroadcastTypeTableSeeder::class);
//            $this->call(NotificationTypeTableSeeder::class);
//            $this->call(DocumentCategorySeeder::class);
//            $this->call(SessionSeeder::class);
//            $this->call(OauthClientsSeeder::class);
//            $this->call(PlenarySittingSeeder::class);
//            $this->call(FontAwesomeSeeder::class);
//            $this->call(CommitteeDocsCatSeeder::class);
//            $this->call(CategoriesSeeder::class);
//            $this->call(CurrencySeeder::class);
        });

    }
}
