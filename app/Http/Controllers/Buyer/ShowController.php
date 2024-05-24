<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function show(Buyer $buyer)
    {
        return inertia('Buyer/Show', compact('buyer'));
    }
}
