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

        $salesData = SaleResource::collection($salesJoins)->resolve();

        return $salesData;
    }

    public function store($saleRequest)
    {
        $product = Product::find($saleRequest->product_id);

        $dbCount = DB::table('products')->select('count_product')->get();
        $productId = $saleRequest->product_id - 1;

        $dbCount = $dbCount->pluck('count_product')->get($productId);

        $count = $dbCount - $saleRequest->count_buy;

        $product->update([
            'count_product' => $count
        ]);

        Sale::create([
            'worker_id' => $saleRequest->worker_id,
            'product_id' => $saleRequest->product_id,
            'buyer_id' => $saleRequest->buyer_id,
            'count_buy' => $saleRequest->count_buy,
            'cost_buy' => $saleRequest->cost_buy,
        ]);
    }

    public function update($sale, $saleRequest)
    {
        $product = Product::find($saleRequest->product_id);

        $dbCount = DB::table('products')->select('count_product')->get();
        $productId = $saleRequest->product_id - 1;

        $dbCount = $dbCount->pluck('count_product')->get($productId);

        if ($sale->count_buy > $saleRequest->count_buy) {
            $saleDecr = $sale->count_buy - $saleRequest->count_buy;
            $count = $dbCount + $saleDecr;
        }
        elseif ($sale->count_buy < $saleRequest->count_buy) {
            $saleDecr = $saleRequest->count_buy - $sale->count_buy;
            $count = $dbCount - $saleDecr;
        }

        $product->update([
            'count_product' => $count
        ]);

        $sale->update([
            'worker_id' => $saleRequest->worker_id,
            'product_id' => $saleRequest->product_id,
            'buyer_id' => $saleRequest->buyer_id,
            'count_buy' => $saleRequest->count_buy,
            'cost_buy' => $saleRequest->cost_buy,
        ]);

        return redirect()->route('sale.index');
    }
}
