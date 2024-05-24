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

//    public function showSales($buyer)
//    {
//        $data = DB::table('sales as s')
//            ->select('w.id', 'w.worker_name', 's.cost_buy', 's.id as s_id', 's.created_at')
//            ->join('workers as w', 's.worker_id', '=', 'w.id')
//            ->get();
//
//        return WorkerSaleResource::collection($data)->resolve();
//    }

    public function store($request)
    {
        $request->validated();

        Worker::create([
            'worker_name' => $request->worker_name,
            'worker_surname' => $request->worker_surname,
            'worker_birthday' => $request->worker_birthday,
            'worker_phone_number' => $request->worker_phone_number,
        ]);
    }

    public function update($request, $worker)
    {
        $request->validated();

        $worker->update([
            'worker_name' => $request->worker_name,
            'worker_surname' => $request->worker_surname,
            'worker_birthday' => $request->worker_birthday,
            'worker_phone_number' => $request->worker_phone_number,
        ]);
    }
}