<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Product $product)
    {
        return inertia('Product/Edit', compact('product'));
    }
}
