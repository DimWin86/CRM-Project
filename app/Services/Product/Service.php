<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function index()
    {
        return Product::all();
    }

    public function store($request)
    {
        $data = $request->validated();

        Product::create($data);
    }

    public function update($request, $product)
    {
        $data = $request->validated();

        $product->update($data);
    }
}
