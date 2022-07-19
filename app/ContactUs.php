<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'phone',
        'order_id',
        'message',
    ];

    protected $table = 'contactus';
}
