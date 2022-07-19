<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DeliveryBoy;
use App\Order;
use App\Http\Resources\orderResource;

use Illuminate\Support\Facades\Validator;
use App\Region;

class DeliveryboyController extends Controller
{
    //
    public function getDeliveryBoy($id){
        $delivery=DeliveryBoy::where('user_id',$id)->first();
        return response()->json(['success'=>'true','data'=>$delivery]);
    }

    public function newRequests($id){
        $delivery=DeliveryBoy::where('user_id',$id)->first();
        
        $order = Order::where([['delivery_id',$delivery->id]])->whereIn('status',['Confirmed','On Delivery'])->get();
        return response()->json(['success'=>'true','data'=>orderResource::collection($order)]);

    }


    public function deliverdRequests($id){
        $delivery=DeliveryBoy::where('user_id',$id)->first();
        // dd($delivery);
        $order = Order::where([['delivery_id',$delivery->id],['status','Delivered']])->get();
        return response()->json(['success'=>'true','data'=>orderResource::collection($order)]);

    }


    public function active(Request $request){
        $delivery=DeliveryBoy::where('user_id',$request->user_id)->first();
        $delivery->status = $request->status;
        $delivery->save(); 
        return response()->json(['success'=>'true','data'=>'status updated successfully']);
    }

    public function isActive($id){
        $delivery=DeliveryBoy::where('user_id',$id)->first();
        $status = $delivery->status;
        return response()->json(['success'=>'true','data'=>$status]);
    }


    public function UpdateOrderStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'orders'=>'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        //  dd($request->products[0]['itemID']);
        
        if ($validator->fails()) {

            return response()->json(['success'=>'false', 'data'=>$validator->messages()]);

        } else {
            // get data 
            if(isset($request->orders)){
                foreach($request->orders as $o){
                    Order::where('id',$o)->update(['status' => $request->status]);
                    
                }
                DeliveryBoy::where('user_id',$request->user_id)->update(['status' => 2]);
            }
            return response()->json(['success'=>'true','data'=>'status updated successfully']);
        }
            

    }

    public function getRegions(){
        $regions = Region::all();
        return response()->json(['success'=>'true','data'=>$regions]);
}

}
