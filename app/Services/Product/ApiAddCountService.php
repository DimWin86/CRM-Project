<?php

namespace App\Services\Product;

class ApiAddCountService
{
    public function edit($product)
    {
        return response()->json([
            'data' => $product,
        ]);
    }

    public function update($request, $product)
    {
        $data = $request->validated();

        $productCount = ($product->count_product) + ($request->count_product);

        $product->update([
            'count_product' => $productCount,
            'date_receiving' => $data['date_receiving'],
        ]);

        return response()->json([
            'data' => $product,
        ]);
    }
}
