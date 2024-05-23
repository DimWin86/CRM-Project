<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function delete(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sale.index');
    }
}
