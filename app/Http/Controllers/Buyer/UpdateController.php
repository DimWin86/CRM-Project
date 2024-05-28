<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\UpdateRequest;
use App\Models\Buyer;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(Buyer $buyer, UpdateRequest $request)
    {
        $this->service->update($request, $buyer);

        return redirect()->route('buyer.index');
    }
}
