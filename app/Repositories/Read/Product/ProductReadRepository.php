<?php

namespace App\Repositories\Read\Product;

use App\Models\Product\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductReadRepository implements ProductReadRepositoryInterface
{

    public function getAll( ?string $query): LengthAwarePaginator
    {
        return Product::query()
            ->where(function ($q) use ($query) {
                $q->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('price', 'like', '%' . $query . '%')
                    ->orWhere('quantity', 'like', '%' . $query . '%');
            })->with('properties')->orderBy('id')->paginate(perPage: 40);
    }
}
