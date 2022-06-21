<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ? 'out of stock' : $this->stock,
            'discount'=>$this->discount,
            'totalPrice' => round($this->price * ( 1 - ($this->discount/100)), 2),
            'rating'=>$this->reviews->count() ? round(($this->reviews->sum('star'))/count($this->reviews), 2) : 'no rating',
            'href'=>[
                'reviews'=>route('reviews.index', $this->id)
            ]
        ];
    }
}
