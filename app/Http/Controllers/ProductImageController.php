<?php

namespace App\Http\Controllers;

use App\Services\ProductImage as ProductImageService;
use App\Http\Requests\StoreProductImageRequest;

class ProductImageController extends Controller
{
    /**
     * Responds to POST /api/product-image
     *
     * @param StoreProductImageRequest $request
     * @param ProductImageService $imageService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductImageRequest $request, ProductImageService $imageService)
    {
        try {
            $imageService->store($request->file('image'));
            return response()->json(['text' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }
}
