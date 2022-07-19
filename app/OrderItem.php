<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable=[
'id',
'qty',
'product_id',
'order_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->hasMany(Order::class,'id','order_id');
    }
}
