<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\MainCategories;
use App\MainCategoryResturant;
use App\resturants;
use App\Slider;
use Carbon\Carbon;
use App\Http\Resources\ProductCollection;

class MainCategoryController extends Controller
{
    public function getMainCategories(){
        $MainCategory =  MainCategories::where('status','1')->get();

        return response()->json(['success'=>'true', 'data'=>$MainCategory]);
}
public function getResturantByCategory($id){
    $resturants =  MainCategories::where([['status','1'],['id',$id]])->with('resturant')->first();
    return response()->json(['success'=>'true', 'data'=>$resturants->resturant]);
}

public function getResturant($id){
    $resturant =  resturants::find($id);

    return response()->json(['success'=>'true', 'data'=>$resturant]);
}

public function homePage($main_cat_id){
    //getMainCategories
    $MainCategory =  MainCategories::where('status','1')->get();
    // getResturantByCategory
    $resturants =  MainCategories::where([['status','1'],['id',$main_cat_id]])->with('resturant')->first();
    //getSlider
    $slider=Slider::all();
    return response()->json(['success'=>'true', 'MainCategories'=>$MainCategory,'resturants'=>$resturants,'slider'=>$slider]);

}
}