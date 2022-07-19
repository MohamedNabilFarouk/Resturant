<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        $weekly_sales = Order::where(['status' => 'Delivered'])->whereDate('updated_at' , '>', Carbon::now()->subWeek())->get();
        $new_user = User::whereDate('created_at' , '>', Carbon::now()->subMonth())->get();
        $pending_orders = Order::where('status', 'Pending')->get();
        $confirmed_orders = Order::where('status', 'Confirmed')->get();
        $latest_products_day = Product::whereDate('created_at', '>', Carbon::now()->subDay())->get();
        $latest_products_week =  Product::whereDate('created_at', '>', Carbon::now()->subWeek())->get();
        $latest_products_month = Product::whereDate('created_at', '>', Carbon::now()->subMonth())->get();
        return view('admin.dashboard', compact('weekly_sales', 'new_user', 'pending_orders', 'confirmed_orders', 'latest_products_day' , 'latest_products_week', 'latest_products_month'));
    }

}
