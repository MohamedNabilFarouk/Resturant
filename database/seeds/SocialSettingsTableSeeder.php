<?php

use Illuminate\Database\Seeder;

class SocialSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'facebook', 'twitter', 'whatsApp', 'linkedIn', 'pinterest', 'instagram', 'youtube',
        ];

        foreach ($settings as $setting){
            $values = [];
            $values += [
                'key' =>  $setting,
            ];

            \App\SocialSetting::create($values);

        } // end of foreach
    }
}
