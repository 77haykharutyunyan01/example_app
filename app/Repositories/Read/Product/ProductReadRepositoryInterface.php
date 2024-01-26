<?php

namespace App\Repositories\Read\Product;


use Illuminate\Pagination\LengthAwarePaginator;


interface ProductReadRepositoryInterface
{
    public function getAll(?string $query): LengthAwarePaginator;

}
