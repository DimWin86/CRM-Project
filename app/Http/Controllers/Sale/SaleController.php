<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class SaleController extends BaseController
{
    public function index()
    {
        $salesData = $this->service->index();

        return inertia('Sale/Index', compact('salesData'));
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

        $this->service->store($request);

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

         $this->service->update($sale, $request);

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
