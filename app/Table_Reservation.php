<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table_Reservation extends Model
{
    //
    protected $table = 'table_reservations';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    } // end of user
}
