<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\BuyerResource;
use App\Models\Buyer;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        $buyers = $this->service->index();

        return inertia('Buyer/Index', compact('buyers'));
    }
}
