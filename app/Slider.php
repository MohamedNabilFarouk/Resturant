<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $guarded = [];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset('images/sliders/' . $value);
    } // end of get image attribute
}
