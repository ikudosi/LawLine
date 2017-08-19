<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductImageRequest;

class ProductImageController extends Controller
{
    /**
     * Responds to POST /api/product-image
     *
     * @param StoreProductImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductImageRequest $request)
    {
        try {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($file->getFilename().'.'.$extension,  File::get($file));

            return response()->json(['text' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['text' => $e->getMessage()], 500);
        }
    }
}
