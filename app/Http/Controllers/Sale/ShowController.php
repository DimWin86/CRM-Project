<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function show(Sale $sale)
    {
        $data = $this->service->show($sale);

        return inertia('Sale/Show', compact('data'));
    }
}
