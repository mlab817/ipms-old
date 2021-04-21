<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;

class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'email'         => $this->email,
            'name'          => $this->name,
            'roles'         => RoleResource::collection($this->whenLoaded('roles')),
            'permissions'   => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
