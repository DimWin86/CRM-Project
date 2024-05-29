<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function edit(Product $product)
    {
        return $this->service->edit($product);
    }
}
