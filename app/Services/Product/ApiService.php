<?php

namespace App\Services\Product;

use App\Models\Product;

class ApiService
{
    public function index()
    {
        return response()->json([
            'data' => Product::all(),
        ]);
    }

    public function store($request)
    {
        $data = $request->validated();

        Product::create($data);

        return 'Product was created';
    }

    public function show($product)
    {
        return response()->json([
           'data' => $product,
        ]);
    }

    public function edit($product)
    {
        return response()->json([
            'data' => $product,
        ]);
    }

    public function update($request, $product)
    {
        $data = $request->validated();

        $product->update($data);

        return response()->json([
            'data' => $product,
        ]);
    }

    public function delete($product)
    {
        $product->delete();

        return 'Product was deleted';
    }
}
