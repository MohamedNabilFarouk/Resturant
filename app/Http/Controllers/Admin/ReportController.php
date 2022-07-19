<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Order;
use App\Reward;
use App\User;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{

    public function index()
    {
        //where('role','=','customer')->
        $customers = User::whereHas('orders')->paginate(10);
        $points = Reward::with('user')->select('user_id','points')->paginate(10);

        return view('admin.reports.index',compact('customers','points'));
    } // end of index





} // end of controller
