<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'        => $this->id,
            'user'      => new UserResource($this->user),
            'nickname'  => $this->nickname,
            'avatar'    => $this->avatar,
            'office'    => new OfficeResource($this->office),
        ];
    }
}
