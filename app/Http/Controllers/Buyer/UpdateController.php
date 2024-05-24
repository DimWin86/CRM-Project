<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(Buyer $buyer, Request $request)
    {
        $this->service->update($request, $buyer);

        return redirect()->route('buyer.index');
    }
}
