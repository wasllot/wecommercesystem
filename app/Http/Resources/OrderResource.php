<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Models\Product;
// use App\Models\User;


class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'img' => $this->img,
            'quantity' => $this->quantity,
            'amount' => $this->amount,
            'order_date' =>$this->order_date,
            'user' =>$this->users->where('id', $this->user_id),
            'product' =>$this->products->where('id', $this->product_id)

        ];
    }
}
