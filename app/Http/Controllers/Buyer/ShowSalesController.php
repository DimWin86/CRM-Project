<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;

class ShowSalesController extends BaseController
{
    public function show(Buyer $buyer)
    {
        $sales = $this->service->showSales($buyer);

        return inertia('BuyerSale/Show', compact('buyer', 'sales') );
    }
}
