<?php

namespace App\Http\Controllers\Api\Worker;

use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;

class UpdateController extends BaseController
{
    public function update(UpdateRequest $request, Worker $worker)
    {
        return $this->service->update($request, $worker);
    }
}
