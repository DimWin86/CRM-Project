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
        $request->validated();

        Product::create([
            'name_product' => $request->name_product,
            'cost_product' => $request->cost_product,
            'count_product' => $request->count_product,
            'date_receiving' => $request->date_receiving,
        ]);
    }

    public function update($request, $product)
    {
        $request->validated();

        $product->update([
            'name_product' => $request->name_product,
            'cost_product' => $request->cost_product,
            'count_product' => $request->count_product,
            'date_receiving' => $request->date_receiving,
        ]);
    }
}
