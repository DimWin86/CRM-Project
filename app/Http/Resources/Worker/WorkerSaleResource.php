<?php

namespace App\Http\Resources\Worker;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->created_at = Carbon::parse($this->created_at);

        return [
            'id' => $this->id,
            's_id' => $this->s_id,
            'worker_name' => $this->worker_name,
            'cost_buy' => $this->cost_buy,
            'date_on_sale' => $this->created_at->diffForHumans(),
        ];
    }
}
