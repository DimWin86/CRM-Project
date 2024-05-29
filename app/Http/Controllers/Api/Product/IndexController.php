<?php

namespace App\Http\Controllers\Api\Product;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->service->index();
    }
}
