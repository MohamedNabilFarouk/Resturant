<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
        'name_en',
        'name_ar',
        'image',
        'status',
    ];

    public function getImageAttribute($value)
    {
        return asset('images/categories/' . $value);

    } // end of get name attribute


    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
