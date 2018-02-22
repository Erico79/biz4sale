<?php

use Illuminate\Database\Seeder;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('oauth_clients')->truncate();
        \App\Models\OauthClients::create([
            'name'=>'CAIMS Personal Access Client',
            'secret'=>'LLdHgpgY03FhmL9nQkwBMugSnGOpoDhMucONUmD0',
            'redirect'=>'localhost',
            'personal_access_client'=>1,
            'password_client'=>0,
            'revoked'=>0
        ]);
        \App\Models\OauthClients::create([
            'name'=>'CAIMS Password Grant Client',
            'secret'=>'bw7LSKigpmHA1MSNYcUrWHzratL8m7Pgrr9IavnH',
            'redirect'=>'localhost',
            'personal_access_client'=>0,
            'password_client'=>1,
            'revoked'=>0
        ]);
    }
}
