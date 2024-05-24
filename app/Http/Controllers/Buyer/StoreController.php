<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\StoreRequest;
use App\Models\Buyer;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(StoreRequest $request)
    {
        $this->store($request);

        return redirect()->route('buyer.index');
    }
}
