<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Traits\imagesTrait;
use App\PackageBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class packageController extends Controller
{
    use imagesTrait;

    //
    public function index()
    {
        $packages = Package::paginate(10);
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'des_en' => 'required|string',
            'des_ar' => 'required|string',
            'price' => 'required|string',
            'image' => 'required',


        ]);
        if ($request->has('image')) {
            $image = $this->saveImages($request->image, 'images/packages');
            $data['image'] = $image;
        }
        $data['status'] = $request->status;

        Package::create($data);
        session()->flash('success', trans('added successfully'));
        return redirect()->route('package.index');
    }

    public function showBooking($id)
    {
        $booking = PackageBooking::with('package','user','branch','bookingExtraItems')->find($id);
        return view('admin.package.bookedSingle', compact('booking'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = PackageBooking::find($id);

        if ( $booking['status']  == 'Completed')
        {
            session()->flash('Error', trans('validation.order already completed'));
        }
        elseif ( $booking['status']  == 'Pending' && $request['status'] == 'Confirmed' || $request['status'] == 'Declined')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            session()->flash('success', trans('validation.Updated Successfully'));
        }
        elseif ( $booking['status']  == 'Confirmed' && $request['status'] == 'Completed')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            session()->flash('success', trans('validation.Updated Successfully'));
        }
        elseif ( $booking['status']  == 'Declined' && $request['status'] == 'Pending' || $request['status'] == 'Confirmed')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            session()->flash('success', trans('validation.Updated Successfully'));
        }
        elseif ( $booking['status']  == 'Confirmed' && $request['status'] == 'Pending')
        {
            $booking['status'] = $request['status'];
            $booking->save();
            session()->flash('success', trans('validation.Updated Successfully'));
        }
        else {
            session()->flash('Error', trans('validation.Booking can not be updated'));
        }

        return redirect()->route('booked.package.details', $booking -> id);
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.package.edit', compact('package'));

    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'des_en' => 'required|string',
            'des_ar' => 'required|string',
            'price' => 'required|string',
        ]);

        $package = Package::find($id);

        DB::beginTransaction();

        if ($request->has('image')) {
            if($package -> image != 'default.png'){
                Storage ::disk('public_uploads') -> delete('packages/' . $package -> image);
            }
            $image = $this->saveImages($request->image, 'images/packages');
            $data['image'] = $image;
        }
        $data['status'] = $request->status;

        $package->update($data);

        DB::commit();

        session()->flash('success', trans('Updated Successfully'));
        return redirect()->route('package.index');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        DB::beginTransaction();

        if($package -> image != 'default.png'){
            Storage ::disk('public_uploads') -> delete('packages/' . $package -> image);
        }
        $package->delete();

        DB::commit();

        session()->flash('success', trans('deleted successfully'));
        return redirect()->route('package.index');
    }


    public function bookedPackages()
    {
        $packages = PackageBooking::all();
        return view('admin.package.booked', compact('packages'));
    }

}
