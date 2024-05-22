<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\BuyerResource;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        $buyersAll = Buyer::all();

        $buyers = BuyerResource::collection($buyersAll)->resolve();

        return inertia('Buyer/Index', compact('buyers'));
    }

    public function create()
    {
        return inertia('Buyer/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'buyer_name' => 'required|string',
            'buyer_surname' => 'required|string',
            'buyer_birthday' => 'required|date',
            'buyer_email' => 'required|string|email',
            'buyer_phone_number' => 'required|integer',
        ]);

        Buyer::create([
           'buyer_name' => $request->buyer_name,
           'buyer_surname' => $request->buyer_surname,
           'buyer_birthday' => $request->buyer_birthday,
           'buyer_email' => $request->buyer_email,
           'buyer_phone_number' => $request->buyer_phone_number,
        ]);

        return redirect()->route('buyer.index');
    }

    public function show(Buyer $buyer)
    {
        return inertia('Buyer/Show', compact('buyer'));
    }

    public function edit(Buyer $buyer)
    {
        return inertia('Buyer/Edit', compact('buyer'));
    }

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

    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return redirect()->route('buyer.index');
    }
}
