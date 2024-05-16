<?php

namespace App\Http\Controllers;

use App\Http\Resources\Worker\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function index()
    {
        $workers = Worker::all();

        $workers = WorkerResource::collection($workers)->resolve();


        return inertia('Worker/Index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return inertia('Worker/Show', compact('worker'));
    }
    public function create()
    {
        return inertia('Worker/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthday' => 'required|date',
            'phone_number' => 'required|integer',
        ]);

        Worker::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('worker.index');
    }
}
