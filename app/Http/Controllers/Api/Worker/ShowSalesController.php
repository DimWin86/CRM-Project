<?php

namespace App\Http\Controllers\Api\Worker;

use App\Models\Worker;

class ShowSalesController extends BaseController
{
    public function show(Worker $worker)
    {
        return $this->service->showSales($worker);
    }
}
