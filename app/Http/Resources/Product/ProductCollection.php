<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'totalPrice' => round($this->price * ( 1 - ($this->discount/100)), 2),
            'rating'=>$this->reviews->count() ? round(($this->reviews->sum('star'))/count($this->reviews), 2) : 'no rating',
            'discount'=>$this->discount . ' %',
            'href'=>[
                'link'=>route('products.show', $this->id)
            ]
        ];
    }
}
