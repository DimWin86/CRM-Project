<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Http\Resources\Worker\WorkerSaleResource;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowSalesController extends BaseController
{
    public function show(Worker $worker)
    {
        $sales = $this->service->showSales();

        return inertia('WorkerSale/Show', compact('worker', 'sales') );
    }
}
