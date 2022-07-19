<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageBookingExtraItems extends Model
{
    protected $table = 'package_booking_extra_items';
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    } // end of package product

    public function packageBooking()
    {
        return $this -> belongsTo(PackageBooking::class, 'package_booking_id');
    } // end of package booking
}
