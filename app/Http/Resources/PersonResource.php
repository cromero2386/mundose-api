<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ProvinceResource;
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
            'nombre' => $this->firstname,
            'apellido' => $this->lastname,
            'correo' => $this->email,
            'provincia' => new ProvinceResource($this->province),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
