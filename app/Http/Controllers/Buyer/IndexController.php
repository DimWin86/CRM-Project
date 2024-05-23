<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\BuyerResource;
use App\Models\Buyer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $buyersAll = Buyer::all();

        $buyers = BuyerResource::collection($buyersAll)->resolve();

        return inertia('Buyer/Index', compact('buyers'));
    }
}
