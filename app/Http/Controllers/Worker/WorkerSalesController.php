<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Http\Resources\Worker\WorkerSaleResource;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerSalesController extends Controller
{
    public function show(Worker $worker)
    {
        $data = DB::table('sales as s')
            ->select('w.id', 'w.worker_name', 's.cost_buy', 's.id as s_id', 's.created_at')
            ->join('workers as w', 's.worker_id', '=', 'w.id')
            ->get();

//        $salesAll = $worker->sales;
//
        $sales = WorkerSaleResource::collection($data)->resolve();

        return inertia('WorkerSale/Show', compact('worker', 'sales') );
    }
}
