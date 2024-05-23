<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(Worker $worker)
    {
        return inertia('Worker/Edit', compact('worker'));
    }
}
