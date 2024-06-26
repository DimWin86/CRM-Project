<?php

namespace App\Http\Resources\Sale;

use Carbon\Carbon;
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
        $this->created_at = Carbon::parse($this->created_at);

        return [
            "id" => $this->id,
            "date_on_sale" => $this->created_at->diffForHumans(),
            "worker_name" => $this->worker_name,
            "worker_surname" => $this->worker_surname,
            "name_product" => $this->name_product,
        ];
    }
}
