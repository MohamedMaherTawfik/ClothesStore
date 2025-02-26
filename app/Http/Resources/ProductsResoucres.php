<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResoucres extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'status' => $this->status,
            'categorey_id' => $this->categorey_id,
            'brand_id' => $this->brand_id,
        ];
    }
}
