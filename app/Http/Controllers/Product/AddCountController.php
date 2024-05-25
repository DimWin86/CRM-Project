<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddCountRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class AddCountController extends BaseController
{
    public function edit(Product $product)
    {
        return inertia('ProductAddCount/Edit', compact('product'));
    }

    public function update(Product $product, AddCountRequest $request)
    {
        $this->addCountService->update($request, $product);

        return redirect()->route('product.show', $product->id);
    }
}
