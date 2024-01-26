<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPropertyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'color' => $this->resource->color,
            'weight' => $this->resource->weight
        ];
    }
}
