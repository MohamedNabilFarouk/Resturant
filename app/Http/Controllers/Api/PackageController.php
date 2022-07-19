<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\PackageBooking;
use App\User;

use App\PackageBookingExtraItems;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Http\Resources\packageResource;
use Illuminate\Support\Facades\Validator;




class PackageController extends Controller
{
    public function getPackages(){
        $packages = Package::all();
        return response()->json(['success'=>'true','data'=>$packages]);
    }
    public function packageBooking(Request $request){

        $validator = Validator::make($request->all(), [
            'package_id'=>'required',
            'user_id'=>'required',
            'type'=>'required',
            'date'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'name'=>'required',
            'total'=>'required',
            // 'products'=>'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['success'=>'false', 'error'=>$validator->messages()]);

        } else {
            DB::beginTransaction();           
            try {    
            $data = $request->all();
            $order=  PackageBooking::create($data);
            if(isset($order)){
                foreach($request->products as $p){
                    // dd($p['itemQuantity']);
                $order_item =  new PackageBookingExtraItems();
                
                $order_item->package_booking_id = $order->id;
                $order_item->product_id = $p['itemID'];
               
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
                    'type'=>'package'
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
            // dd($response);
            // // end notification


            return response()->json(['success'=>'true','data'=>$order->id]);
            
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json(['success'=>'false', 'data'=>'error']);
        }
           
        }
    }

    // public function updatePackagePayment(Request $request){
        
    //     $booking = PackageBooking::where('id', $request->id)->first();
    
    //     $booking->is_paid = $request->is_paid;
    //     $order->save();
    //     return response()->json(['success'=>'true']);
    // }

    public function getbookedPackages(){
        $packages = PackageBooking::with('package','bookingExtraItems')->orderBy('id','desc')->get();
        return response()->json(['success'=>'true','data'=>packageResource::collection($packages)]);
    }

    
    public function updateBookingStatus(Request $request)
    {
        //booking_id,status,
        $booking = PackageBooking::find($request->booking_id);

        if ( $booking['status']  == 'Completed')
        {
            return response()->json(['success'=>'false','data'=>'order already completed']);
        }
        elseif ( $booking['status']  == 'Pending' && $request['status'] == 'Confirmed' || $request['status'] == 'Declined')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            return response()->json(['success'=>'true','data'=>'order updated Successfully']);
        }
        elseif ( $booking['status']  == 'Confirmed' && $request['status'] == 'Completed')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            return response()->json(['success'=>'true','data'=>'order updated Successfully']);
        }
        elseif ( $booking['status']  == 'Declined' && $request['status'] == 'Pending' || $request['status'] == 'Confirmed')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            return response()->json(['success'=>'true','data'=>'order updated Successfully']);
        }
        elseif ( $booking['status']  == 'Confirmed' && $request['status'] == 'Pending')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            return response()->json(['success'=>'true','data'=>'order updated Successfully']);
        }
        else {
            return response()->json(['success'=>'true','data'=>'Booking can not be updated']);
          
        }

        return response()->json(['success'=>'true','data'=>packageResource::collection($booking)]);
    }



}
