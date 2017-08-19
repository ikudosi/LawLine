<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Responds to GET /api/products/{id}
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($product_id)
    {
        try {
            return Product::findOrFail($product_id);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 404);
        }
    }

    /**
     * Responds to POST /api/products/{id}
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
     * Responds to PATCH /api/products/{id}
     *
     * @param product_id
     * @param UpdateProduct $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($product_id, UpdateProduct $request)
    {
        try {

            Product::findOrFail($product_id)->update($request->toArray());
            return response()->json([], 200);

        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 404);
        }
    }

    /**
     * Responds to DELETE /api/products/{id}
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($product_id)
    {
        try {
            Product::findOrFail($product_id)->delete();

            return response()->json([]);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 404);
        }
    }
}
