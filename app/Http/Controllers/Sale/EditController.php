<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function edit(Sale $sale)
    {
        return inertia('Sale/Edit', compact('sale'));
    }
}
