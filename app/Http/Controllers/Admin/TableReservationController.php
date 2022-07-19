<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Traits\imagesTrait;
use App\Table_Reservation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TableReservationController extends Controller
{
    use imagesTrait;

    //
    public function index()
    {
        $reservation = Table_Reservation::orderBy('id','desc')->paginate(10);
        return view('admin.Table_Reservation.index', compact('reservation'));
    }

  

 

    public function confirmBooking(Request $request )
    {
        //  dd($request->id);
        $booking = Table_Reservation::find($request->id);
        $booking->status = $request->status;
        $booking->save(); 
        return redirect()->route('TableReservations.index');

    }

   

  
    public function destroy($id)
    {
        
        $Table_Reservation = Table_Reservation::find($id);
        // dd($Table_Reservation);
      

        $Table_Reservation->delete();

      
        session()->flash('success', trans('deleted successfully'));
        return redirect()->route('TableReservations.index');
    }


    

}
