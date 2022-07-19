<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\PackageBookingExtraItems;
class packageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $this->order_item;
        $items = PackageBookingExtraItems::where('package_booking_id',$this->id)->with('product')->get();
        // $delivery = $this->region->fees;
    // if($this->status == 'Pending'){
    //     $delivery_id = 0;
    // }else{
    //     $delivery_id = $this->delivery->user_id;
        
    // }
        // $this->user;
        // return parent::toArray($request);
        return [
           'order_id'=>$this->id,
           'package_name_en'=>$this->package->name_en,
           'package_name_ar'=>$this->package->name_ar,
           'order_status'=>$this->status,
           'name'=>$this->name,
           'order_address'=>$this->address,
           'order_phone'=>$this->phone,
           'order_total'=>$this->total,
        //    'delivery'=>$delivery,
        //    'order_branch'=>$this->branch->name_en,
           'is_paid'=>$this->is_paid,
            // 'delivery_id'=>$delivery_id,
            'items'=>$items,
            // 'lat'=>$this->lat,
            // 'lng'=>$this->lng,
          

        ];

    }
}
