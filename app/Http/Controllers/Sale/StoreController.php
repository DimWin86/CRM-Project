<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
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
}
