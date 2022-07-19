<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ContactUs;


class ContactusController extends Controller
{
    //
    public function index(){

            $messages= ContactUs::paginate(10);
            return view('admin.message.index',compact('messages'));
    }

    public function destroy($id)
    {
        $message = ContactUs ::find($id);
        $message-> delete();
        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('messages.index');
    }
}
