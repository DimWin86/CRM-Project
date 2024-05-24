<?php

namespace App\Services\Sale;

use App\Http\Resources\Sale\SaleResource;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Service
{
    public function index()
    {
        $salesJoins = DB::table('sales as s')
            ->select('s.id', 'w.worker_name', 'w.worker_surname', 'p.name_product', 's.created_at')
            ->join('workers as w', 's.worker_id', '=', 'w.id')
            ->join('products as p', 's.product_id', '=', 'p.id' )
            ->orderBy('s.created_at', 'DESC')
            ->get();

        return SaleResource::collection($salesJoins)->resolve();
    }

///////////// ----- Потом переделаю под Join чтобы все было красивее ///////////////////////
//    public function show($sale)
//    {
//        $worker = $sale->worker;
//
//        $buyer = $sale->buyer;
//
//        $product = $sale->product;
//
//        return [$worker, $buyer, $product];
//    }
///////////////////////////////////////////

    public function store($request)
    {
        $request->validated();

        $product = Product::find($request->product_id);

        $dbCount = DB::table('products')->select('count_product')->get();
        $productId = $request->product_id - 1;

        $dbCount = $dbCount->pluck('count_product')->get($productId);

        $count = $dbCount - $request->count_buy;

        $product->update([
            'count_product' => $count
        ]);

        Sale::create([
            'worker_id' => $request->worker_id,
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
            'count_buy' => $request->count_buy,
            'cost_buy' => $request->cost_buy,
        ]);
    }

    public function update($sale, $request)
    {
        $request->validated();

        $product = Product::find($request->product_id);

        $dbCount = DB::table('products')->select('count_product')->get();
        $productId = $request->product_id - 1;

        $dbCount = $dbCount->pluck('count_product')->get($productId);

        if ($sale->count_buy > $request->count_buy) {
            $saleDecr = $sale->count_buy - $request->count_buy;
            $count = $dbCount + $saleDecr;
        }
        elseif ($sale->count_buy < $request->count_buy) {
            $saleDecr = $request->count_buy - $sale->count_buy;
            $count = $dbCount - $saleDecr;
        }

        $product->update([
            'count_product' => $count
        ]);

        $sale->update([
            'worker_id' => $request->worker_id,
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
            'count_buy' => $request->count_buy,
            'cost_buy' => $request->cost_buy,
        ]);

        return redirect()->route('sale.index');
    }
}
