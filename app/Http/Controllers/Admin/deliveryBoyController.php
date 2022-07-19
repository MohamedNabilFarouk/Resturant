<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DeliveryBoy;
use App\Traits\imagesTrait;
use App\User;
use Illuminate\Support\Facades\Storage;


class deliveryBoyController extends Controller
{
    use imagesTrait;

    public function index()
    {
        $deliveryBoys = DeliveryBoy ::paginate(10);
        return view('admin.deliveryBoy.index', compact('deliveryBoys'));
    }

    public function create()
    {
        // $users = User::whereRoleIs('admin')->orWhereRoleIs('regular-user')->get();

        $delivery = User ::whereRoleIs('delivery') -> with('deliveryboy') -> get();

        //   dd($delivery);
        return view('admin.deliveryBoy.create', compact('delivery'));
    }

    public function store(Request $request)
    {
        $data = $request -> validate([

            'user_id' => 'required',

            'vehicle_no' => 'required|string',
            'driving_License_no' => 'required|string',
            'id_proof_no' => 'required',

            'criminal_records_certificate' => 'required',
            'drugs_analysis' => 'required',
            'car_License_front' => 'required',
            'car_License_back' => 'required',
            'License_front' => 'required',
            'License_back' => 'required',
            'proof_front' => 'required',
            'proof_back' => 'required',

        ]);

        if ($request -> has('criminal_records_certificate')) {
            $criminal_records_certificate = $this -> saveImages($request -> criminal_records_certificate, 'images/deliveryBoy');
            $data['criminal_records_certificate'] = $criminal_records_certificate;
        }

        if ($request -> has('drugs_analysis')) {
            $drugs_analysis = $this -> saveImages($request -> drugs_analysis, 'images/deliveryBoy');
            $data['drugs_analysis'] = $drugs_analysis;
        }
        $car_License_front = $this -> saveImages($request -> car_License_front, 'images/deliveryBoy');
        $data['car_License_front'] = $car_License_front;

        $car_License_back = $this -> saveImages($request -> car_License_back, 'images/deliveryBoy');
        $data['car_License_back'] = $car_License_back;

        $licence_front = $this -> saveImages($request -> License_front, 'images/deliveryBoy');
        $data['License_front'] = $licence_front;

        $licence_back = $this -> saveImages($request -> License_back, 'images/deliveryBoy');
        $data['License_back'] = $licence_back;

        $proof_front = $this -> saveImages($request -> proof_front, 'images/deliveryBoy');
        $data['proof_front'] = $proof_front;

        $proof_back = $this -> saveImages($request -> proof_back, 'images/deliveryBoy');
        $data['proof_back'] = $proof_back;

        if (!$request -> has('is_staff')) {
            $data['is_staff'] = 0;
        } else {
            $data['is_staff'] = 1;
        }

        DeliveryBoy::create($data);

        session() -> flash('success', trans('validation.added successfully'));
        return redirect() -> route('deliveryBoy.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $deliveryBoy = DeliveryBoy ::find($id);
        return view('admin.deliveryBoy.edit', compact('deliveryBoy'));

    }


    public function update(Request $request, $id)
    {
        $data = $request -> validate([

            'vehicle_no' => 'required|string',
            'driving_License_no' => 'required|string',
            'id_proof_no' => 'required',

        ]);

        $deliveryBoy = DeliveryBoy ::find($id);
        if ($request -> has('criminal_records_certificate')) {
            $criminal_records_certificate = $this -> saveImages($request -> criminal_records_certificate, 'images/deliveryBoy');
            $data['criminal_records_certificate'] = $criminal_records_certificate;
        }
        if ($request -> has('drugs_analysis')) {
            $drugs_analysis = $this -> saveImages($request -> drugs_analysis, 'images/deliveryBoy');
            $data['drugs_analysis'] = $drugs_analysis;
        }
        if ($request -> has('car_License_front')) {
            $car_License_front = $this -> saveImages($request -> car_License_front, 'images/deliveryBoy');
            $data['car_License_front'] = $car_License_front;
        }
        if ($request -> has('car_License_back')) {
            $car_License_back = $this -> saveImages($request -> car_License_back, 'images/deliveryBoy');
            $data['car_License_back'] = $car_License_back;
        }
        if ($request -> has('License_front')) {
            $licence_front = $this -> saveImages($request -> License_front, 'images/deliveryBoy');
            $data['License_front'] = $licence_front;
        }

        if ($request -> has('License_back')) {
            $licence_back = $this -> saveImages($request -> License_back, 'images/deliveryBoy');
            $data['License_back'] = $License_back;
        }

        if ($request -> has('proof_front')) {
            $proof_front = $this -> saveImages($request -> proof_front, 'images/deliveryBoy');
            $data['proof_front'] = $proof_front;
        }
        if ($request -> has('proof_back')) {
            $proof_back = $this -> saveImages($request -> proof_back, 'images/deliveryBoy');
            $data['proof_back'] = $proof_back;
        }
        if (!$request -> has('is_staff')) {
            $data['is_staff'] = 0;
        } else {
            $data['is_staff'] = 1;
        }

        $deliveryBoy -> update($data);
        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('deliveryBoy.index');
    }

    public function destroy($id)
    {
        //
        DeliveryBoy ::where('id', $id) -> delete();
        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('deliveryBoy.index');
    }

    public function updateStatus()
    {

        if ((auth() -> user() -> roles[0] -> id == 3)) {
            $user = auth() -> user() -> id;
            $user -> deliveryboy -> status = 1;
            $user -> save();
        }
    }

    public function deliveryReport($id)
    {
        $delivery_boy = DeliveryBoy::with('orders')->find($id);
        $fees = 5;

        $weekly_orders = $delivery_boy -> orders -> where('status', 'Delivered') -> whereBetween('updated_at', [
            Carbon::now() -> subDays(8),
            Carbon::now(),
        ]);

        $daily_orders = [];
        foreach ($weekly_orders -> groupBy('delivery_date')  as $index => $order){
            $daily_orders += [$index => $order];
        }

        return view('admin.deliveryBoy.report', compact('delivery_boy', 'fees', 'weekly_orders', 'daily_orders'));
    }

}
