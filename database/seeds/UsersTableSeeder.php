<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Masterfile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mf = Masterfile::where('phone_no', '254720254253')->first();

        User::create([
            'email' => env('SYS_ADMIN_EMAIL'),
            'password' => bcrypt(env('SYS_ADMIN_PASS')),
            'role_id' => Role::admin()->id,
            'masterfile_id' => $mf->id
        ]);
    }
}
