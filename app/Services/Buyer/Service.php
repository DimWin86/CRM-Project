<?php

namespace App\Services\Buyer;

use App\Http\Resources\Buyer\BuyerResource;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Product;

class Service
{
    public function index()
    {
        $buyersAll = Buyer::all();

        return BuyerResource::collection($buyersAll)->resolve();
    }

    public function showSales($buyer)
    {
        $salesAll = $buyer->sales;

        return SaleResource::collection($salesAll)->resolve();
    }

    public function store($request)
    {
        $data = $request->validated();

        Buyer::create($data);
    }

    public function update($request, $buyer)
    {
        $data = $request->validated();

        $buyer->update($data);
    }
}
