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
            'name' => $this->name,
            'surname' => $this->surname,
            'birthday' => $this->birthday,
            'phone_number' => $this->phone_number,
            'sale_id' => $this->sale_id,
            'dateOnAdd' => $this->created_at->diffForHumans(),
        ];
    }
}
