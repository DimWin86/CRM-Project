<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
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
}
