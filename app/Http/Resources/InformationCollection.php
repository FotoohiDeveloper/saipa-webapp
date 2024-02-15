<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InformationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array<int|string, mixed>
     */
    public function toArray($request): array
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'type' => $item->type,
                'reception_number' => $item->reception_number,
                'application_number' => $item->application_number,
                'national_code' => $item->national_code,
                'id_number' => $item->id_number,
                'car_name' => $item->car_name,
                'owner_fullname' => $item->owner_fullname
            ];
        })->toArray();
    }
}
