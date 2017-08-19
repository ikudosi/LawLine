<?php

namespace App\Http\Controllers;

use App\Services\ProductImage as ProductImageService;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use App\Models\Product;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Responds to GET /api/product/{id}
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($product_id)
    {
        try {
            return Product::find($product_id);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 404);
        }
    }

    /**
     * Responds to POST /api/product/{id}
     *
     * @param StoreProduct $request
     * @param ProductImageService $imageService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request, ProductImageService $imageService)
    {
        try {
            $data = [
                'name'          => $request->get('name'),
                'description'   => $request->get('description'),
                'price'         => $request->get('price'),
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageService->store($file);
                $data['image'] = $file->getClientOriginalName();
            }

            Product::create($data);

            return response()->json(['text' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }

    /**
     * Responds to POST /api/product/{id}
     *
     * @param $product_id
     * @param UpdateProduct $request
     * @param ProductImageService $imageService
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($product_id, UpdateProduct $request, ProductImageService $imageService)
    {
        try {
            $data = [
                'name'          => $request->get('name'),
                'description'   => $request->get('description'),
                'price'         => $request->get('price'),
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageService->store($file);
                $data['image'] = $file->getClientOriginalName();
            }

            Product::findOrFail($product_id)->update($data);

            return response()->json(['text' => 'success'], 200);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getFile()], 404);
        }
    }

    /**
     * Responds to DELETE /api/product/{id}
     *
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($product_id)
    {
        try {
            Product::findOrFail($product_id)->delete();
            return response()->json(['text' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 404);
        }
    }
}
