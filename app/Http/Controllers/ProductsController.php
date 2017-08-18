<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|min:1',
            'description'   => 'required|min:1',
            'price'         => 'required|numeric',
            'image'         => 'sometimes|image'
        ]);

        return response()->json([], 200);
    }
}
