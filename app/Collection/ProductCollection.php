<?php 
namespace App\Collection;
use Illuminate\Database\Eloquent\Collection;

 class ProductCollection extends Collection
{
    public function discoutPrice(){

        return [
            'name_en'=>$this->name_en,
        'name_ar'=>$this->name_ar,
        'image'=>$this->image,
        'category_id'=>$this->category->name_en,
        'price'=>$this->price,
        'cal'=>$this->cal,
        'veg'=>$this->veg,
        'promotional'=>$this->promotional,
        'status'=>$this->status,

        ];
    //     if((isset($this->discount)) && ($this->discount->published == 1)&&  ($this->discount->to >= Carbon::now()->format('Y-m-d'))){
    //         if($this->discount->discount_type == 'Flat'){
    //             return $this->price - $this->discount->discount;
    //         }else{
    //           return $this->price * ($this->discount->discount)/100;
    //         }
    //     }
        
    // }

}

}


?>