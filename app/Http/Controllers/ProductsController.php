<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Stores a record to the products table.
     *
     * @param StoreProduct $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {
        try {

            Product::create($request->toArray());
            return response()->json([], 200);

        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }

    /**
     * @param Product $product
     * @param UpdateProduct $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Product $product, UpdateProduct $request)
    {
        try {

            $product->update($request->toArray());
            return response()->json([], 200);

        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }
}
