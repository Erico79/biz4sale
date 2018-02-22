<?php

use Illuminate\Database\Seeder;
use App\NotificationType;

class NotificationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificationType::create(['name' => 'PUSH Notification', 'code' => 'PUSH']);
        NotificationType::create(['name' => 'SMS Notification', 'code' => 'SMS']);
        NotificationType::create(['name' => 'Email Notification', 'code' => 'EMAIL']);
    }
}
