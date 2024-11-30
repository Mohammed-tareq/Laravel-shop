<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'oldprice' => $this->oldprice,
            'qty' => $this->qty,
            'category_name' => $this->category->name,
            'subcategory_name' => $this->subcategory->name,
            'brand_name' => $this->brand->name,
        ];
    }
}
