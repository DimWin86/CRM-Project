<?php

namespace App\Http\Controllers\Api\Worker;


class IndexController extends BaseController
{
    public function index()
    {
        return $this->service->index();
    }
}
