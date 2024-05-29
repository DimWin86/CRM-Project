<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(Product $product, UpdateRequest $request)
    {
        return $this->service->update($request, $product);
    }
}
