<?php

namespace App\Services\Buyer;

use App\Models\Buyer;
use Illuminate\Support\Facades\DB;

class ApiService
{
    public function index()
    {
        return response()->json([
            'data' => Buyer::all(),
        ]);
    }

    public function showSales($buyer)
    {
        return response()->json([
            'data' => DB::table('sales as s')
                ->select('b.id', 'b.buyer_name', 's.cost_buy', 's.id as s_id', 's.created_at')
                ->where('buyer_id', '=', $buyer->id)
                ->join('buyers as b', 's.buyer_id', '=', 'b.id')
                ->get(),
        ]);
    }

    public function show($buyer)
    {
        return response()->json([
            'data' => $buyer,
        ]);
    }

    public function edit($buyer)
    {
        return response()->json([
            'data' => $buyer,
        ]);
    }

    public function store($request)
    {
        $data = $request->validated();

        Buyer::create($data);

        return 'buyer was created';
    }

    public function update($request, $buyer)
    {
        $data = $request->validated();

        $buyer->update($data);

        return response()->json([
            'data' => $buyer,
        ]);
    }

    public function delete($buyer)
    {
        $buyer->delete();

        return "Buyer was deleted";
    }
}
