<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerSalesController extends Controller
{
    public function show(Worker $worker)
    {
        $salesAll = $worker->sales;

        $sales = SaleResource::collection($salesAll)->resolve();

        return inertia('WorkerSale/Show', compact('worker', 'sales') );
    }
}
