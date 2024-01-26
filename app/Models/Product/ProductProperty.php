<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $fillable = ['color', 'weight'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
