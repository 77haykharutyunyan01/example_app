<?php

namespace App\Services\Product;

use App\Repositories\Read\Product\ProductReadRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductAction
{
    public function __construct(
        protected ProductReadRepositoryInterface $productReadRepository
    ) {}

    public function run(?string $query): LengthAwarePaginator
    {
        return $this->productReadRepository->getAll($query);
    }
}
