<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $fillable = [
      'id',
      'discount_type',
      'discount',
      'product_id',
      'from',
      'to',
      'published'
    ];
    public function product(){
        return $this->hasOne(Product::class,'id','product_id')
            ->select('category_id','id','name_'.app()->getLocale().' as product_name');

    }
}
