<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return redirect()->route('buyer.index');
    }
}
