<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(Sale $sale, Request $request)
    {
        $this->service->update($sale, $request);

        return redirect()->route('sale.index');
    }
}
