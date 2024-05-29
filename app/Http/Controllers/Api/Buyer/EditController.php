<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function edit(Buyer $buyer)
    {
        return $this->service->edit($buyer);
    }
}
