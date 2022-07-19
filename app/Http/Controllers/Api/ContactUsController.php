<?php

namespace App\Http\Controllers\Api;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    //
    public function addMessage(Request $request){

        $data = Validator::make($request->all(),[
            'name'=> 'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required',

        ]);

        if ($data->fails()) {

            return response()->json(['success'=>'false', 'data'=>$data->messages()]);

        } else {


            DB::beginTransaction();

            $contact_data = new ContactUs;
            $contact_data-> name = $request->name;
            $contact_data->phone = $request->phone;
            $contact_data->email = $request->email;
            $contact_data->message = $request->message;
        //  $contact_data->order_id = $request->order_id;

            $contact_data->save();



            DB::commit();

            return response()->json(['success'=>'true']);
        }
    }
}
