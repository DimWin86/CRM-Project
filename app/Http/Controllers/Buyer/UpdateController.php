<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Buyer $buyer, Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|string',
            'buyer_surname' => 'required|string',
            'buyer_birthday' => 'required|date',
            'buyer_email' => 'required|string|email',
            'buyer_phone_number' => 'required|integer',
        ]);

        $buyer->update([
            'buyer_name' => $request->buyer_name,
            'buyer_surname' => $request->buyer_surname,
            'buyer_birthday' => $request->buyer_birthday,
            'buyer_email' => $request->buyer_email,
            'buyer_phone_number' => $request->buyer_phone_number,
        ]);

        return redirect()->route('buyer.index');
    }
}
