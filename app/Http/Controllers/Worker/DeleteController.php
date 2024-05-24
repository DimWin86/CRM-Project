<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function delete(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('worker.index');
    }
}
