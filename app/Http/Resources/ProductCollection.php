<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;



class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->prices);
        $price = $this->price;
        $price_before = $this->price;
        $extra_prices=[];
        $is_discount = 0;
        if(isset($this->prices)){
            $extra_prices = $this->prices;
        }
        if((isset($this->discount)) && ($this->discount->published == 1)&&  ($this->discount->to >= Carbon::now()->format('Y-m-d'))){
        //  dd('here');
                $is_discount = 1;

                if($this->discount->discount_type == 'Flat'){
                //    $price  = $this->price - $this->discount->discount;
                $price_before = $this->price + $this->discount->discount;
                            foreach($extra_prices as $p){
                                $extra_prices_after[]=['size'=>$p->size , 'price'=>$p->price - $this->discount->discount ];
                            }
                }else{
                    // $price = ($this->price) - ($this->price * ($this->discount->discount)/100);
                $price_before =  (($this->price) * (($this->discount->discount)/100))/((100-$this->discount->discount)/100) + ($this->price);

                    foreach($extra_prices as $p){
                        $extra_prices_after[]=['size'=>$p->size , 'price'=>($p->price) - ($p->price * ($this->discount->discount)/100) ];
                    }
                }
                $extra_prices = $extra_prices_after;
            }

        return [
            'id'=>$this->id,
            'name_en'=>$this->name_en,
            'name_ar'=>$this->name_ar,
            'des_en'=>$this->des_en,
            'des_ar'=>$this->des_ar,
            'image'=>$this->image,
            'category_id'=>$this->category_id,
            'category_name'=>$this->category->name_en,
            'is_discount'=> $is_discount,
            'price'=>strval($price),
            'price_before'=>$price_before,
            'extra_prices'=>$extra_prices,
            'cal'=>$this->cal,
            'veg'=>$this->veg,
            'promotional'=>$this->promotional,
            'status'=>$this->status,

        ];

        // return parent::toArray($request);
    }
}
