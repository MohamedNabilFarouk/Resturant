<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=[
            'id',
            'branch_id',
            'user_id',
            'delivery_id',
            'type',
            'region_id',
            'address',
            'phone',
            'total',
            'status',
            'lat',
            'lng',
    ];

    public $appends = ['delivery_date'];

    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }
    public function delivery(){
        return $this->belongsTo(DeliveryBoy::class,'delivery_id');
    }

    public function order_item(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    public function getDeliveryDateAttribute(){
        return $this -> updated_at -> format('Y-m-d');
    }
}
