<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function update(UpdateRequest $request, Worker $worker)
    {
        $this->service->update($request, $worker);

        return redirect()->route('worker.show', $worker->id);
    }
}
