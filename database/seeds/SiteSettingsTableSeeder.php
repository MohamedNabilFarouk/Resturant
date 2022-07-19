<?php

use App\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_settings = new SiteSetting();
        $site_settings -> logo = 'default.png';
        $site_settings -> favicon = 'favicon.png';
        $site_settings -> phone = '01XXXXXXXXX';
        $site_settings -> title_en = 'test';
        $site_settings -> title_ar = 'test_ar';
        $site_settings -> welcome_phrase_en = 'test';
        $site_settings -> welcome_phrase_ar = 'test_ar';
        $site_settings -> address_en = 'test';
        $site_settings -> address_ar = 'test_ar';
        $site_settings -> city_en = 'test';
        $site_settings -> city_ar = 'test_ar';
        $site_settings -> country_en = 'test';
        $site_settings -> country_ar = 'test_ar';
        $site_settings -> meta_title_en = 'test';
        $site_settings -> meta_title_ar = 'test_ar';
        $site_settings -> meta_description_en = 'test';
        $site_settings -> meta_description_ar = 'test_ar';
        $site_settings -> meta_keyword_en = 'test';
        $site_settings -> meta_keyword_ar = 'test_ar';
        $site_settings -> save();
    }
}
