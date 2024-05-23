<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|string',
            'cost_product' => 'required|integer',
            'count_product' => 'required|integer',
            'date_receiving' => 'required|date',
        ]);

        Product::create([
            'name_product' => $request->name_product,
            'cost_product' => $request->cost_product,
            'count_product' => $request->count_product,
            'date_receiving' => $request->date_receiving,
        ]);

        return redirect()->route('product.index');
    }
}
