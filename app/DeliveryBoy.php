<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  DeliveryBoy extends Model
{
    protected $fillable=[

        'user_id',
        'status',
        'is_staff',

        'vehicle_no',
        'driving_License_no',
        'id_proof_no',

        'criminal_records_certificate',
        'drugs_analysis',
        'car_License_front',
        'car_License_back',
        'License_front',
        'License_back',
        'proof_front',
        'proof_back',

    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function orders()
    {
        return $this -> hasMany(Order::class, 'delivery_id', 'id');
    }
}
