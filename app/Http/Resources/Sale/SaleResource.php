<?php

namespace App\Http\Resources\Sale;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'worker_id' => $this->worker_id,
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id,
            'count_buy' => $this->count_buy,
            'cost_buy' => $this->cost_buy,
            'date_on_sale' => $this->created_at->diffForHumans(),
        ];
    }
}
