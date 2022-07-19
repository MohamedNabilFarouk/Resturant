<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\User;
use App\Table_Reservation;

use App\PackageBookingExtraItems;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Http\Resources\packageResource;
use Illuminate\Support\Facades\Validator;


class TableReservationController extends Controller
{
    public function getUserReservation($id){
        $reservation = Table_Reservation::where('user_id',$id)->get();
        return response()->json(['success'=>'true','data'=>$reservation]);
    }


    public function TableReservation(Request $request){

        $validator = Validator::make($request->all(), [
            
            'user_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'time'=>'required',
            'no_of_persons'=>'required',
        ]);
        if ($validator->fails()) {

            return response()->json(['success'=>'false', 'error'=>$validator->messages()]);

        } else {
               
            try {    
            $data = $request->all();
            $order =  Table_Reservation::create($data);
            
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
                       'type'=>'table'
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
         
            return response()->json(['success'=>'true','data'=>$order]);
            
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json(['success'=>'false', 'data'=>'error']);
        }
           
        }
    }


    public function getbookedTabels(){
        $reservation = Table_Reservation::orderBy('id','desc')->get();
 
        return response()->json(['success'=>'true','data'=>$reservation]);
    }


    public function confirmBooking(Request $request )
    {
        //  id , status
        // dd($request);
        $booking = Table_Reservation::findOrFail($request->id);
        
        $booking->status = $request->status;
        $booking->save(); 
        return response()->json(['success'=>'true','data'=>'updated successfully']);

    }



}
