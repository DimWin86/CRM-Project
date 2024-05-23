<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Worker\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $workersAll = Worker::all();

        $workers = WorkerResource::collection($workersAll)->resolve();

        return inertia('Worker/Index', compact('workers'));
    }
}
