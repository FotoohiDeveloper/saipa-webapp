<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'name' => $this->resource['name'],
            'email' => $this->resource['email'],
            'created_at' => $this->resource['created_at'],
            'role' => $this->resource['role'],
            'token' => $this->resource['token'],
        ];
    }
}
