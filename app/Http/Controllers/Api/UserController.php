<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Package;
use App\Product;
use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\SiteSetting;
 


class UserController extends Controller
{
    public function getUserWishlist($id)
    {
        $wishlist = Wishlist::where('user_id', $id)->with('product')->get();
        //  dd($wishlist[0]->product);

        foreach ($wishlist as $w) {
            $product[] = $w->product[0];
        }
        if (isset($product)) {
            return response()->json(['success' => 'true', 'data' => $product]);
        } else {

            return response()->json(['success' => 'false', 'data' => 'No User Wishlist ']);
        }
    } // end of getUserWishlist

    public function addUserWishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'product_id' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(['success' => 'false', 'error' => $validator->messages()]);
        } else {
            $wishlist = Wishlist::where([['user_id', $request->user_id], ['product_id', $request->product_id]])->first();
            // dd($wishlist);
            if (empty($wishlist)) {
                Wishlist::create($request->all());
                return response()->json(['success' => 'true', 'data' => 'Created Successfully']);
            } else {
                $wishlist->delete();
                return response()->json(['success' => 'true', 'data' => 'deleted Successfully']);
            }
        }
    } // end of addUserWishlist


    public function isFav(Request $request)
    {
        $wishlist = Wishlist::where([['product_id', $request->product_id], ['user_id', $request->user_id]])->first();
        if (isset($wishlist)) {
            return response()->json(['success' => 'true', 'data' => 'true']);
        } else {
            return response()->json(['success' => 'true', 'data' => 'false']);
        }
    } // end of isFav

    public function searchProducts(Request $request)
    {
        $products = Product::where('name_en' , 'like',  '%' . $request -> search . '%')
                ->orWhere('name_ar' , 'like',  '%' . $request -> search . '%')
                ->get();

        return response()->json(['success' => 'true', 'data' => $products]);

    } // end of searchProducts

    public function updateUser(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => ['string','max:255'],
            'address' => ['string'],
            'lat' => ['max:255'],
            'lng' => ['max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users'],
            'phone' => [ 'string', 'max:255', 'unique:users'],
        ]);
     
        
            
        
        if ($validator->fails()) {    
            return response()->json(['success' => 'false', 'error' => $validator->messages()]);
        } else {
            
            $data =$request->all();
            if(isset($request->password)){
                if (Hash::check($request->old_password , $user->password)){
              $data['password'] = Hash::make($request->password);          
                }else{
                    return response()->json(['success' => 'false', 'error' => 'Old password not true']);
                }
            }
            
            $user = User::find($request->user_id);
            $user->update($data);
            return response()->json(['success' => 'true', 'data' => $user]);
        }
    }

    public function Setting(){
        $setings=  SiteSetting::select('hot_line')->first();
        return response()->json(['success' => 'true', 'data' => $setings]);

    }

} //end of controller
