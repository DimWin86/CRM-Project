<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Requests\Product\AddCountRequest;
use App\Models\Product;

class AddCountController extends BaseController
{
    public function edit(Product $product)
    {
        return $this->addCountService->edit($product);
    }

    public function update(Product $product, AddCountRequest $request)
    {
        return $this->addCountService->update($request, $product);
    }
}
