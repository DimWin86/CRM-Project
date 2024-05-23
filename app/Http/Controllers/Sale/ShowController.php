<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function show(Sale $sale)
    {
        $worker = $sale->worker;

        $buyer = $sale->buyer;

        $product = $sale->product;

        return inertia('Sale/Show', compact('sale', ['worker', 'buyer', 'product']));
    }
}
