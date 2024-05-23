<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AddCountController extends Controller
{
    public function edit(Product $product)
    {
        return inertia('ProductAddCount/Edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'count_product' => 'required|integer',
            'date_receiving' => 'required|date',
        ]);

        $productCount = ($product->count_product) + ($request->count_product);

        $product->update([
            'count_product' => $productCount,
            'date_receiving' => $request->date_receiving,
        ]);

        return redirect()->route('product.show', $product->id);
    }
}
