<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;

class DeleteController extends BaseController
{
    public function delete(Product $product)
    {
        return $this->service->delete($product);
    }
}
