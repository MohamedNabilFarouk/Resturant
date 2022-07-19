<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductPrice extends Model
{
    //
    protected $table = "product_prices";

    protected $fillable = [
        'product_id',
        'size',
        'price'
    ];


}
