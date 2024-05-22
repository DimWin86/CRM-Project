<?php

namespace App\Http\Resources\Worker;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'worker_name' => $this->worker_name,
            'worker_surname' => $this->worker_surname,
            'worker_birthday' => $this->worker_birthday,
            'worker_phone_number' => $this->worker_phone_number,
            'date_on_add' => $this->created_at->diffForHumans(),
        ];
    }
}
