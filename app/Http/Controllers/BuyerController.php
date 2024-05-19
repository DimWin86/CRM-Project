<?php

namespace App\Http\Controllers;

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
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthday' => 'required|date',
            'email' => 'required|string|email',
            'phone_number' => 'required|integer',
        ]);

        Buyer::create([
           'name' => $request->name,
           'surname' => $request->surname,
           'birthday' => $request->birthday,
           'email' => $request->email,
           'phone_number' => $request->phone_number,
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
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthday' => 'required|date',
            'email' => 'required|string|email',
            'phone_number' => 'required|integer',
        ]);

        $buyer->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('buyer.index');
    }

    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return redirect()->route('buyer.index');
    }
}
