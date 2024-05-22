<?php

namespace App\Http\Resources\Buyer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuyerResource extends JsonResource
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
            'buyer_name' => $this->buyer_name,
            'buyer_surname' => $this->buyer_surname,
            'buyer_birthday' => $this->buyer_birthday,
            'buyer_email' => $this->buyer_email,
            'buyer_phone_number' => $this->buyer_phone_number,
            'date_on_add' => $this->created_at->diffForHumans(),
        ];
    }
}
