<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return inertia('Product/Index', compact('products'));
    }

    public function create()
    {
        return inertia('Product/Create');
    }

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

    public function edit(Product $product)
    {
        return inertia('Product/Edit', compact('product'));
    }

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

    public function show(Product $product)
    {
        return inertia('Product/Show', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
