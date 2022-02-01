<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return optional($this)['user'] ? [
            'user'  => new UserResource($this['user']),
            'token' => $this['token']
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
            'message' => optional($this->resource)['message'] ? $this->resource['message'] : false,
            'errors'  => [
                'throwable' => optional($this->resource)['throwable'] ? $this->resource['throwable'] : false
            ]
        ];
    }
}
