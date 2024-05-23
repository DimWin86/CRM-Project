<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'worker_name' => 'required|string',
            'worker_surname' => 'required|string',
            'worker_birthday' => 'required|date',
            'worker_phone_number' => 'required|integer',
        ]);

        $worker->update([
            'worker_name' => $request->worker_name,
            'worker_surname' => $request->worker_surname,
            'worker_birthday' => $request->worker_birthday,
            'worker_phone_number' => $request->worker_phone_number,
        ]);

        return redirect()->route('worker.show', $worker->id);
    }
}
