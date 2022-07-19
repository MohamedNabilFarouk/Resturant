<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    //
    protected $fillable=[

        'package_id',
        'user_id',
        'branch_id',
        'type',
        'with_service',
        'date',
        'note',
        'is_paid',
        'status',
        'name',
        'phone',
        'address',
        'total',
    ];

    public function package(){
        return $this->belongsTo(Package::class, 'package_id','id');
    } // end of package

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    } // end of user

    public function branch()
    {
        return $this -> belongsTo(Branch::class, 'branch_id');
    } // end of branch

    public function bookingExtraItems()
    {
        return $this -> hasMany(PackageBookingExtraItems::class, 'package_booking_id');
    } // end of booking extra items
}
