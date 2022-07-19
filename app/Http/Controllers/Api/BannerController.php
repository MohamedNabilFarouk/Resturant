<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    //
    public function getBanner(){
        $banner=Banner::all();
        return response()->json(['success'=>'true','data'=>$banner]);
    }
}
