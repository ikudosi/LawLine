<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{

    /**
     * Responds to GET /api/products
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|static[]
     */
    public function index()
    {
        try {
            return Product::all();
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }
}
