<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\BuyerResource;
use App\Models\Buyer;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->service->index();
    }
}
