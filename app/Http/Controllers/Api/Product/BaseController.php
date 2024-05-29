<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\ApiAddCountService;
use App\Services\Product\ApiService;

class BaseController extends Controller
{
    public $service;
    public $addCountService;
    public function __construct(ApiService $service, ApiAddCountService $addCountService)
    {
        $this->service = $service;

        $this->addCountService = $addCountService;
    }
}
