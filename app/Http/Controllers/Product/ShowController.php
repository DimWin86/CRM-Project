<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Product $product)
    {
        return inertia('Product/Show', compact('product'));
    }
}
