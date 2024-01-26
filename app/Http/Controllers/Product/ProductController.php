<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductAction;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Note"},
     *   path="/api/product",
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(
     *     name="search",
     *     in="query",
     *     description="Search term for filtering products",
     *     required=false,
     *     @OA\Schema(type="string"),
     *   ),
     *     @OA\Parameter(
     *     name="Authorization",
     *     in="header",
     *     description="Search term for filtering products",
     *     required=true,
     *     @OA\Schema(type="string"),
     *   ),
     *   @OA\Response(response="200", description="OK"),
     *   @OA\Response(response="404", description="Not Found"),
     * )
     */
    public function __invoke(
        ProductRequest $productRequest,
        ProductAction $productAction
    ){
        $products = $productAction->run($productRequest->getSearch());

        return ProductResource::collection($products);
    }
}
