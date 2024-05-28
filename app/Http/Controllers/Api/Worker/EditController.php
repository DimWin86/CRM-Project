<?php

namespace App\Http\Controllers\Api\Worker;

use App\Models\Worker;

class EditController extends BaseController
{
    public function edit(Worker $worker)
    {
        return $this->service->edit($worker);
    }
}
