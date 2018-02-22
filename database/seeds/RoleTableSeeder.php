<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    const sys_admin = 'SYSADMIN';
    const core_admin = 'COREADMIN';
    const mca = "MCA";
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'System Admin', 'code' => self::sys_admin]);
        Role::create(['name' => 'Core Admin', 'code' => self::core_admin]);
        Role::create(['name' => 'MCA', 'code' => self::mca]);
    }
}
