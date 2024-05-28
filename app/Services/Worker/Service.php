<?php

namespace App\Services\Worker;

use App\Http\Resources\Buyer\BuyerResource;
use App\Http\Resources\Sale\SaleResource;
use App\Http\Resources\Worker\WorkerResource;
use App\Http\Resources\Worker\WorkerSaleResource;
use App\Models\Buyer;
use App\Models\Product;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index()
    {
        $workersAll = Worker::all();

        return WorkerResource::collection($workersAll)->resolve();
    }

    public function showSales()
    {
        $data = DB::table('sales as s')
            ->select('w.id', 'w.worker_name', 's.cost_buy', 's.id as s_id', 's.created_at')
            ->join('workers as w', 's.worker_id', '=', 'w.id')
            ->get();

        return WorkerSaleResource::collection($data)->resolve();
    }

    public function store($request)
    {
        $data = $request->validated();

        Worker::create($data);
    }

    public function update($request, $worker)
    {
        $data = $request->validated();

        $worker->update($data);
    }
}
