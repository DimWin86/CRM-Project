<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\StoreRequest;
use App\Models\Buyer;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }
}
