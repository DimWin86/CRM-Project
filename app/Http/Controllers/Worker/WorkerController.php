<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Worker\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function index()
    {
        $workersAll = Worker::all();

        $workers = WorkerResource::collection($workersAll)->resolve();


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

    public function edit(Worker $worker)
    {
        return inertia('Worker/Edit', compact('worker'));
    }

    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'birthday' => 'required|date',
            'phone_number' => 'required|integer',
        ]);

        $worker->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('worker.show', $worker->id);
    }

    public function delete(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('worker.index');
    }
}
