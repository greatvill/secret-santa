<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read User $resource
 */
class UserResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'santa' => [
                'id' => $this->resource->santa?->id,
                'name' => $this->resource->santa?->name,
            ]
        ];
    }
}
