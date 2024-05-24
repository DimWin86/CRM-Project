<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function show(Worker $worker)
    {
        return inertia('Worker/Show', compact('worker'));
    }
}
