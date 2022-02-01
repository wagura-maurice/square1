<?php

namespace App\Http\Resources;

use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return optional($this)->id ? [
            'name'              => $this->name ?? NULL,
            'email'             => $this->email ?? NULL,
            'email_verified_at' => $this->email_verified_at ?? NULL,
            '_status'           => $this->_status ?? NULL,
            'roles'             => RoleResource::collection($this->whenLoaded('roles')),
            'abilities'         => AbilityResource::collection($this->whenLoaded('abilities')),
            'posts'             => PostResource::collection($this->whenLoaded('posts'))
        ] : false;
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'throwable' => optional($this->resource)['throwable'] ? $this->resource['throwable'] : false,
            ],
        ];
    }
}
