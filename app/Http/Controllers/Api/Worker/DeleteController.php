<?php

namespace App\Http\Controllers\Api\Worker;

use App\Models\Worker;

class DeleteController extends BaseController
{
    public function delete(Worker $worker)
    {
        return $this->service->delete($worker);
    }
}
