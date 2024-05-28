<?php

namespace App\Services\Worker;

use App\Http\Resources\Worker\WorkerResource;
use App\Http\Resources\Worker\WorkerSaleResource;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class ApiService
{
    public function index()
    {
        $workers = Worker::all();

        return response()->json([
            'data' => $workers,
        ]);
    }

    public function show($worker)
    {
        return response()->json([
           'data' => $worker,
        ]);
    }

    public function showSales($worker)
    {
        $data = DB::table('sales as s')
            ->select('w.id', 'w.worker_name', 's.cost_buy', 's.id as s_id', 's.created_at')
            ->where('w.id', '=', $worker->id)
            ->join('workers as w', 's.worker_id', '=', 'w.id')
            ->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function store($request)
    {
        $data = $request->validated();
        $worker = Worker::create($data);
        return WorkerResource::make($worker)->resolve();
    }

    public function edit($worker)
    {
        return response()->json([
            'data' => $worker,
        ]);
    }

    public function update($request, $worker)
    {
        $data = $request->validated();
        $worker->update($data);
        return WorkerResource::make($worker)->resolve();
    }

    public function delete($worker)
    {
        $worker->delete();
        return "Worker was deleted";
    }
}
