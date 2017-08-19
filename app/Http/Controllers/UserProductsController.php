<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserProductsController extends Controller
{
    /**
     * Responds to GET /api/user/products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $user = Auth::guard('api')->user();
            return response()->json($user->products);
        } catch (\Exception $e) {
            return response()->json(['text' => 'success']);
        }
    }
}
