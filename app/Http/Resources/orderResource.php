<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\OrderItem;
class orderResource extends JsonResource
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
        $items = OrderItem::where('order_id',$this->id)->with('product')->get();
        $delivery = $this->region->fees;
    if($this->status == 'Pending'){
        $delivery_id = 0;
    }else{
        $delivery_id = $this->delivery->user_id;
        
    }
    // return $request;
        // $this->user;
        // return parent::toArray($request);
        return [
           'order_id'=>$this->id,
           'order_status'=>$this->status,
           'order_name'=>$this->user->name ?? '',
           'order_address'=>$this->address,
           'order_phone'=>$this->phone,
           'order_total'=>$this->total,
           'delivery'=>$delivery,
           'order_type'=>$this->type,
           'order_branch'=>$this->branch->name_en,
           'is_paid'=>$this->is_paid,
            'delivery_id'=>$delivery_id,
            'items'=>$items,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
          

        ];

    }
}
