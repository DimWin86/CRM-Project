<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        $products = $this->service->index();

        return inertia('Product/Index', compact('products'));
    }
}
