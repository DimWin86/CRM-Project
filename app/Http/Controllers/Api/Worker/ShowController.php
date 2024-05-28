<?php

namespace App\Http\Controllers\Api\Worker;

use App\Models\Worker;

class ShowController extends BaseController
{
    public function show(Worker $worker)
    {
        return $this->service->show($worker);
    }
}
