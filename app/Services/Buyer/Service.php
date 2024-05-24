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
        $request->validated();

        Buyer::create([
            'buyer_name' => $request->buyer_name,
            'buyer_surname' => $request->buyer_surname,
            'buyer_birthday' => $request->buyer_birthday,
            'buyer_email' => $request->buyer_email,
            'buyer_phone_number' => $request->buyer_phone_number,
        ]);
    }

    public function update($request, $buyer)
    {
        $request->validated();

        $buyer->update([
            'buyer_name' => $request->buyer_name,
            'buyer_surname' => $request->buyer_surname,
            'buyer_birthday' => $request->buyer_birthday,
            'buyer_email' => $request->buyer_email,
            'buyer_phone_number' => $request->buyer_phone_number,
        ]);
    }
}
