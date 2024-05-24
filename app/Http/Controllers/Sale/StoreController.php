<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function store(StoreRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('sale.index');
    }
}
