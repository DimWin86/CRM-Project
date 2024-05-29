<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Buyer;
use App\Models\Sale;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowSalesController extends BaseController
{
    public function show(Buyer $buyer)
    {
        return $this->service->showSales($buyer);
    }
}
