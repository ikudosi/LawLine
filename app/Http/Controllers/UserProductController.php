<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    /**
     * Responds to PUT /api/user/product/{id}
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($product_id)
    {
        try {
            $product = Product::byIds([$product_id])->get();
            $user = Auth::guard('api')->user();

            $user->setProducts($product);

            return response()->json(['text' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()]);
        }
    }

    /**
     * Responds to DELETE /api/user/product/{id]
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($product_id)
    {
        try {
            $user = Auth::guard('api')->user();
            $user->userProducts()->where('product_id', $product_id)->delete();

            return response()->json(['text' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()]);
        }
    }
}
