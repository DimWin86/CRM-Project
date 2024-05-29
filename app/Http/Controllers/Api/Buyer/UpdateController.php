<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Requests\Buyer\UpdateRequest;
use App\Models\Buyer;

class UpdateController extends BaseController
{
    public function update(Buyer $buyer, UpdateRequest $request)
    {
        return $this->service->update($request, $buyer);
    }
}
