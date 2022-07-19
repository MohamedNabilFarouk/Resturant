<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\orderResource;
use App\PackageBooking;
use App\DeliveryBoy;
use App\User;

class OrderController extends Controller
{
    //
    public function getUserOrders($id){
        $orders= Order::where('user_id',$id)->orderBy('id','DESC')->get();
        // $items = OrderItem::where('order_id','6')->get();
        // dd($orders);
        return response()->json(['success'=>'true', 'data'=>orderResource::collection($orders)]);
    }

    // public function getDeliveryOrders($id){
    //     $orders= Order::where([['delivery_id',$id],['status','Delivered']])->get();
    //     return response()->json(['success'=>'true', 'data'=>$orders]);
    // }

    public function addOrder(Request $request){
//     
        $validator = Validator::make($request->all(), [
            'total'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'type'=>'required',
            'products'=>'required',
            'branch_id'=>'required',
            'region_id'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            
        ]);
        //  dd($request->products[0]['itemID']);
        
        if ($validator->fails()) {

            return response()->json(['success'=>'false', 'data'=>$validator->messages()]);

        } else {
            DB::beginTransaction();

           
            try {    
            $order = Order::create($request->all());
        //    dd($order->toArray());
            if(isset($order)){
                foreach($request->products as $p){
                    // dd($p['itemQuantity']);
                $order_item =  new OrderItem();
                
                $order_item->order_id = $order->id;
                $order_item->product_id = $p['itemID'];
                $order_item->size = $p['itemSize'];
                $order_item->price = $p['itemPrice'];
                $order_item->qty = $p['itemQuantity'];
                $order_item->save();
               
                }
            }
            DB::commit();
            // // notification here
$users = User::whereRoleIs('admin')->get();

            $SERVER_API_KEY = env('SERVER_API_KEY');
            //   $token_1 = 'exn9J8SqT6yQiS4vv8LSeM:APA91bHESgzENbXb8kclNUp--G5uHS965mhllPqliLyfQHsxKGu3bSHbCmcQeFrFYZgDMs2mm5sV--Zo9USPkfm6TVntofE1ICS4RO6H-t2__Dyx4lRLx9DY_DOQ_GZKKmcwOCs6X8kQ';
        //    $token_1= $user->fcm_token;
            
        foreach($users as $u){
        $data = [
                        
                "registration_ids" => [
                    $u->fcm_token,
                ],

                'data'=> [
                    'orderId'=>$order->id,
                    'status'=> 'inorder',
                    'type'=>'order'
                ],

                 "sound"=> "default" // required for sound on ios
        
            ];
            $dataString = json_encode($data);
            $headers = [
                        
                'Authorization: key=' . $SERVER_API_KEY,
        
                'Content-Type: application/json',
        
            ];

            $ch = curl_init();
                        
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        
            curl_setopt($ch, CURLOPT_POST, true);
        
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        
            $response = curl_exec($ch);
        }
            //  dd($response);
            // // end notification

        return response()->json(['success'=>'true', 'data'=>$order->id]);
            
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json(['success'=>'false', 'data'=>'error']);
        }
                
        }
    }

    public function updatePayment(Request $request){
        try{
            if($request->type == 'order'){
                $order = Order::findOrFail($request->id);
                $order->is_paid = $request->is_paid;
                $order->save();
            }else{
                $booking = PackageBooking::findOrFail($request->id);
                $booking->is_paid = $request->is_paid;
                $booking->save();
            }
            return response()->json(['success'=>'true']);
        }catch(\Exception $e) {
            return response()->json(['success'=>'false','error'=>'error in update payment']);
        }
      
       
    }


    public function getOrders(){
        $orders = Order::orderBy('id','DESC')->get();
        return response()->json(['success'=>'true','data'=>orderResource::collection($orders)]);
    }

    public function getActiveDelivery(){
        $delivery = DeliveryBoy::where('status', '1')->with('user')->get();
        return response()->json(['success'=>'true','data'=>$delivery]);
    }

    // under construction
    public function assignOrder(Request $request)
    {
        // order_id, delivery_id
        // dd($request->delivery_id);
        $order = Order::find($request->order_id);

        $old_delivery = DeliveryBoy::find($order['delivery_id']);

     
            $new_delivery = DeliveryBoy::find($request -> delivery_id);
    

        if (!$new_delivery) {
            
            return response()->json(['success'=>'false','data'=>'No Delivery Boys Available']);

           
        }

        if(isset($old_delivery)){
            $old_delivery -> status = '1';
            $old_delivery -> save();
        }

        // $delivery = DeliveryBoy::find($new_delivery -> id);
        // $delivery -> status = '2';
        // $delivery -> save();

        $order -> delivery_id = $new_delivery -> id;
        $order->status = 'Confirmed';
        $order -> update();

        if ($order -> save()) {
            return response()->json(['success'=>'true','data'=>'Updated Successfully']);
        } else {
            return response()->json(['success'=>'false','data'=>'Error in update']);
        }

        return redirect() -> route('order.index');
    }
   
}

