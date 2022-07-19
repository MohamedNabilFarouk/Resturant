<?php

use App\Banner;
use App\Slider;
use Illuminate\Database\Seeder;

class AdsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = ['1', '2', '3'];

        foreach ($banners as $i => $banner){
            $banner = new Banner();
            $banner->title_en = 'banner-' . ($i+1);
            $banner->title_ar = 'banner-' . ($i+1);
            $banner->image = 'default.png';
            $banner->des_en = 'banner-' . ($i+1);
            $banner->des_ar = 'banner-' . ($i+1);
            $banner->save();
        }

        $sliders = ['1', '2', '3'];

        foreach ($sliders as $i => $slider) {
            $slider = new Slider();
            $slider->title_en = 'slider-' . ($i + 1);
            $slider->title_ar = 'slider-' . ($i + 1);
            $slider->image = 'default.png';
            $slider->des_en = 'slider-' . ($i + 1);
            $slider->des_ar = 'slider-' . ($i + 1);
            $slider->save();
        }
    }
}
