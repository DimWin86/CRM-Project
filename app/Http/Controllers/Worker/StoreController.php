<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function store(Request $request)
    {
        $this->service->store($request);

        return redirect()->route('worker.index');
    }
}
