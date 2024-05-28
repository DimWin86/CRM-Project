<?php

namespace App\Http\Controllers\Api\Worker;

use App\Http\Controllers\Controller;
use App\Services\Worker\ApiService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(ApiService $service)
    {
        $this->service = $service;
    }
}
