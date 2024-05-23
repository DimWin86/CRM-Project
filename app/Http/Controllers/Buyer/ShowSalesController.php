<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;

class ShowSalesController extends Controller
{
    public function show(Buyer $buyer)
    {
        $salesAll = $buyer->sales;

        $sales = SaleResource::collection($salesAll)->resolve();



        return inertia('BuyerSale/Show', compact('buyer', 'sales') );
    }
}
