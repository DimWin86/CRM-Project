<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(Product $product, UpdateRequest $request)
    {
        $this->service->update($request, $product);

        return redirect()->route('product.index');
    }
}
