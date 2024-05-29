<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function show(Buyer $buyer)
    {
        return $this->service->show($buyer);
    }
}
