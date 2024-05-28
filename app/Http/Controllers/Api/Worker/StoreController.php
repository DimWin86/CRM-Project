<?php

namespace App\Http\Controllers\Api\Worker;

use App\Http\Requests\Worker\StoreRequest;

class StoreController extends BaseController
{
    public function store(StoreRequest $request)
    {
        return $this->service->store($request);
    }
}
