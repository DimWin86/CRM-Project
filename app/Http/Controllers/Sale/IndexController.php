<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        $salesData = $this->service->index();

        return inertia('Sale/Index', compact('salesData'));
    }
}
