<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BeyondCode\Vouchers\Traits\HasVouchers;
use App\Collection\ProductCollection;
use Carbon\Carbon;

class Product extends Model
{
    //
use HasVouchers;
    protected $fillable=[
        'name_en',
        'name_ar',
        'des_en',
        'des_ar',
        'image',
        'category_id',
        'price',
        'in_package_price',
        'cal',
        'veg',
        'promotional',
        'status',
    ];

    public function getImageAttribute($value)
    {
        return asset('images/products/' . $value);
    } // end of get image attribute

    public function discount(){
        return $this->hasOne(Discount::class);
    }

    public function wishlist(){
        return $this->belongsTo(Wishlist::class,'product_id','id');
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id')
            ->select('id','name_'.app()->getLocale().' as name');
    }


    public function order_item(){
        return $this->belongsTo(OrderItem::class,'id','product_id');
    }

    public function packageBookingExtraItems()
    {
        return $this -> hasMany(PackageBookingExtraItems::class, 'product_id');
    } // end of package booking extra items

    public function newCollection(array $models = [])
    {

        return new ProductCollection($models);
    }

    public function getPriceAttribute($value){
        // $extra_prices = $this->prices;
        // dd($extra_prices);
        if((isset($this->discount)) && ($this->discount->published == 1)&&  ($this->discount->to >= Carbon::now()->format('Y-m-d'))){
            //  dd('here');


                    if($this->discount->discount_type == 'Flat'){
                        $value  = $value - $this->discount->discount;
                        // foreach($extra_prices as $p){
                        //     $extra_prices_after[]=['size'=>$p->size , 'price'=>$p->price - $this->discount->discount ];
                        // }
                    }else{
                        $value = ($value) - ($value * ($this->discount->discount)/100);
                        // foreach($extra_prices as $p){
                        //     $extra_prices_after[]=['size'=>$p->size , 'price'=>($p->price) - ($p->price * ($this->discount->discount)/100) ];
                        // }
                    }
                    // $extra_prices = $extra_prices_after;
                }



                return (string) $value;
    }

    public function prices(){
        return $this->hasMany(ProductPrice::class, 'product_id', 'id');
    }

}
