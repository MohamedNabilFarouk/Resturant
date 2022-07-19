<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;
use App\Slider;
use Carbon\Carbon;
use App\Http\Resources\ProductCollection;
use BeyondCode\Vouchers\Models\Voucher;

use BeyondCode\Vouchers\Facades\vouchers as Vouchers;


class ProductController extends Controller
{
    //
    public function getProducts(){
            $products =  Product::all();

            return response()->json(['success'=>'true', 'data'=>ProductCollection::collection($products)]);
    }

    public function getCategories(){
        $categories= Category::with('products')->get();
        return response()->json(['success'=>'true', 'data'=>$categories]);
    }

    public function getProductCategory($id){
        $products= Product::where('category_id',$id)->get();
        return response()->json(['success'=>'true', 'data'=>ProductCollection::collection($products)]);
    }

    public function getProduct($id){
        $products= Product::where('id',$id)->with('category')->get();
        return response()->json(['success'=>'true', 'data'=>ProductCollection::collection($products)]);
    }

    public function search($product){
        $products = Product::where('name_en','Like','%'.$product.'%')->orWhere('name_ar','Like','%'.$product.'%')->get();
    // dd($products);
    return response()->json(['success'=>'true', 'data'=>ProductCollection::collection($products)]);

    }

    public function promocode( Request $request){
        $copon = Voucher ::where([['code',$request->code],['expires_at', '>=', Carbon::now()]]) ->first();
    
        if($copon){
            $discount=   $copon->data->get('discount');
            return response()->json(['success'=>'true', 'data'=>$discount]);
        }else{
            return response()->json(['success'=>'false', 'data'=>'Code not valid']);
        }
      
    }

    public function getHome(){
        $banner=Banner::all();
        $slider=Slider::all();
        $categories= Category::get();
        return response()->json(['success'=>'true', 'banner'=>$banner,'slider'=>$slider,'categories'=>$categories]);
    }


    
}
