<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\AddCountService;
use App\Services\Product\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;
    public $addCountService;
    public function __construct(Service $service, AddCountService $addCountService)
    {
        $this->service = $service;

        $this->addCountService = $addCountService;
    }
}
