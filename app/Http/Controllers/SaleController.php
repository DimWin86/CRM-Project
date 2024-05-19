<?php

namespace App\Http\Controllers;

use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        $buyers = Buyer::all();

        $products = Product::all();

        $salesAll = Sale::all();

        $sales = SaleResource::collection($salesAll)->resolve();

        return inertia('Sale/Index', compact('sales', ['buyers', 'workers', 'products']));
    }

    public function create()
    {
        return inertia('Sale/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'worker_id' => 'required|integer',
            'product_id' => 'required|integer',
            'buyer_id' => 'nullable|integer',
            'count_buy' => 'required|integer',
            'cost_buy' => 'required|integer',
        ]);

        Sale::create([
            'worker_id' => $request->worker_id,
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
            'count_buy' => $request->count_buy,
            'cost_buy' => $request->cost_buy,
        ]);

        return redirect()->route('sale.index');
    }

    public function edit(Sale $sale)
    {
        return inertia('Sale/Edit', compact('sale'));
    }

    public function update(Sale $sale, Request $request)
    {
        $request->validate([
            'worker_id' => 'required|integer',
            'product_id' => 'required|integer',
            'buyer_id' => 'nullable|integer',
            'count_buy' => 'required|integer',
            'cost_buy' => 'required|integer',
        ]);

        $sale->update([
            'worker_id' => $request->worker_id,
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
            'count_buy' => $request->count_buy,
            'cost_buy' => $request->cost_buy,
        ]);

        return redirect()->route('sale.index');
    }

    public function show(Sale $sale)
    {
        $worker = $sale->worker;

        $buyer = $sale->buyer;

        $product = $sale->product;

        return inertia('Sale/Show', compact('sale', ['worker', 'buyer', 'product']));
    }

    public function delete(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sale.index');
    }
}
