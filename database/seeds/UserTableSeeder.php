<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Masterfile;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mf = Masterfile::where('national_id', '12345678')->first();
        $role = Role::where('code', 'SYSADMIN')->first();

        User::create([
            'name' => $mf->surname.' '.$mf->firstname,
            'email' => env('SYSADMINEMAIL'),
            'password' => bcrypt(env('SYSADMINPASS')),
            'masterfile_id' => $mf->id,
            'role_id' => $role->id,
            'email_confirmed'=>true,
            'password_changed'=>true
        ]);
    }
}
