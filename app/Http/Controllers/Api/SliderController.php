<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    //
    public function getSlider(){
        $slider=Slider::all();
        return response()->json(['success'=>'true','data'=>$slider]);
    }
}
