<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function delete(Buyer $buyer)
    {
        return $this->service->delete($buyer);
    }
}
