<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'second_name' => $this->second_name,
            'status' => $this->status,
            'sex' => $this->sex,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'date_of_birth' => Carbon::make($this->date_of_birth),
            'date_of_death' => Carbon::make($this->date_of_death),
        ];
    }
}
