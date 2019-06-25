<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'ftp_url' => 'test',
            'ftp_username' => 'test',
            'ftp_password' => "test",
            'ftp_path' => "test"
        ]);
    }
}
