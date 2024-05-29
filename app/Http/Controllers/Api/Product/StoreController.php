<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }
}
