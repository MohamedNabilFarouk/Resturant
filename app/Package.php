<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable=[
                'name_en',
                'name_ar',
                'des_en',
                'des_ar',
                'image',
                'price',
                'status',
    ];

    public function getImageAttribute($value)
    {
        return asset('images/packages/' . $value);
    } // end of get image attribute

}
