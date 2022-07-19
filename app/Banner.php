<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=[
        'title_en',
        'title_ar',
        'image',
        'des_en',
        'des_ar',
        'default',
        'expire_at',

    ];

    
    public function getImageAttribute($value)
    {
        $date = Carbon::now();
        if($date > $this->expire_at)
        {
            $value = $this->default;
           
            //its already expired
        } else {
            //stil to go 
            $value = $value;
        }
               

        return asset('images/banners/' . $value);
    } // end of get name attribute

    // public function getDefaultAttribute($value){
    //     return asset('images/banners/' . $value);
    // }

}
