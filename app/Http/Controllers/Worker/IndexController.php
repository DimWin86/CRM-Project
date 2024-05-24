<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Worker\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index()
    {
        $workers = $this->service->index();

        return inertia('Worker/Index', compact('workers'));
    }
}
