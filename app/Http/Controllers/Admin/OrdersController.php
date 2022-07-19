<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\DeliveryBoy;

class OrdersController extends Controller
{

    public function index()
    {

        $orders = Order::orderBy('id','DESC')->paginate(10);
        
        $delivery = DeliveryBoy::where('status', '1')->get();
        //  dd($delivery);

        return view('admin.order.index', compact('orders', 'delivery'));
    }

    public function getOrderByStatus($status)
    {
        $delivery = DeliveryBoy::where('status', '1') -> get();
        //   dd($delivery);

        $orders = Order::where('status', $status)->orderBy('id','DESC') -> paginate(10);
        // dd($orders);
        return view('admin.order.index', compact('orders', 'delivery'));

    }

    public function printOrder($id)
    {
        $products=[];
        $order = Order::find($id);
        foreach($order->order_item as $index=>$i){
            $products[$index]['item'] = $i->product ;
            $products[$index]['qty'] = $i->qty;
            $products[$index]['size'] = $i->size;
            $products[$index]['price'] = $i->price;
     }
        return view('admin.order.print', compact('order','products'));

    }

    public function show($id)
    {
        //
        // dd($id);
        $products=[];
        $order = Order::find($id);
        foreach($order->order_item as $index=>$i){
               $products[$index]['item'] = $i->product ;
               $products[$index]['qty'] = $i->qty;
               $products[$index]['size'] = $i->size;
            $products[$index]['price'] = $i->price;

        }
        //  dd($products);
        return view('admin.order.show', compact('order','products'));
    }

    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.order.edit', compact('order'));

    }

    public function update(Request $request, $id)
    {

        $order = Order::find($id);

        $order['status'] = $request -> status;

        $order -> save();

        if ($order['status'] == 'Delivered'){
            $delivery = DeliveryBoy::find($order['delivery_id']);
            $delivery -> status = '1';
            $delivery -> save();
        }


        session() -> flash('success', trans('Updated  Successfully'));
        return redirect() -> route('order.index');
    }


    public function assignOrder(Request $request, $id)
    {
        // dd($request->delivery_id);
        $order = Order::find($id);

        $old_delivery = DeliveryBoy::find($order['delivery_id']);

        // if ($order -> status != 'Confirmed') {
        //     session() -> flash('Error', trans('validation.Please Confirm Order First'));
        //     return redirect() -> route('order.index');
        // }

        // if ($request -> delivery_id == 0) {
        //     $new_delivery = DeliveryBoy::inRandomOrder() -> where(['status' => '1', 'is_staff' => 1]) -> first();
        //     if (!$new_delivery) {
        //         $new_delivery = DeliveryBoy::inRandomOrder() -> where(['status' => '1', 'is_staff' => 0]) -> first();
        //     }
        // } else {
            $new_delivery = DeliveryBoy::find($request -> delivery_id);
        // }

        if (!$new_delivery) {
            session() -> flash('Error', trans('validation.No Delivery Boys Available'));
            return redirect() -> route('order.index');
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
            session() -> flash('success', trans('validation.Updated Successfully'));
        } else {
            session() -> flash('Error', trans('Error in Update'));
        }

        return redirect() -> route('order.index');
    }

    public function destroy($id)
    {
        //
        Order::where('id', $id) -> delete();
        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('order.index');
    }

} // end of controller
