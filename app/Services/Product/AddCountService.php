<?php

namespace App\Services\Product;

use App\Models\Product;

class AddCountService
{
    public function update($request, $product)
    {
        $request->validated();

        $productCount = ($product->count_product) + ($request->count_product);

        $product->update([
            'count_product' => $productCount,
            'date_receiving' => $request->date_receiving,
        ]);
    }
}
