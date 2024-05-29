<?php

namespace App\Http\Controllers\Api\Buyer;

use App\Http\Controllers\Controller;
use App\Services\Buyer\ApiService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ApiService $service)
    {
        $this->service = $service;
    }
}
