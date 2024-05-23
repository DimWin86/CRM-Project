<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name_product' => 'required|string',
            'cost_product' => 'required|integer',
            'count_product' => 'required|integer',
            'date_receiving' => 'required|date',
        ]);

        $product->update([
            'name_product' => $request->name_product,
            'cost_product' => $request->cost_product,
            'count_product' => $request->count_product,
            'date_receiving' => $request->date_receiving,
        ]);

        return redirect()->route('product.index');
    }
}
