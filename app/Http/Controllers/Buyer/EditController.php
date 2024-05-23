<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Buyer $buyer)
    {
        return inertia('Buyer/Edit', compact('buyer'));
    }
}
