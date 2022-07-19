<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable=[
        'name_en'     ,
        'name_ar',
        'address_en',
        'address_ar',
        'area_en',
        'area_ar',
        'opening_time',
        'closing_time',
        'phone',
        'status'  ,
        'package_per_day',
    ];

    public function packageBooking(){
        return $this -> hasMany(PackageBooking::class, 'branch_id');
    }
}
