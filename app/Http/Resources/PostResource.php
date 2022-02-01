<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* If the post has a title, return an array with the post's ID, title, description, publication
        date, created_at, and updated_at. Otherwise, return false. */
        return optional($this)->title ? [
            'id'          => $this->id ,
            'title'       => $this->title ,
            'description' => $this->description ,
            'published'   => Carbon::parse($this->publication_date)->diffForHumans(),
            'created_at'  => optional($this)->created_at ? Carbon::parse($this->created_at)->toDateTimeString() : NULL,
            'updated_at'  => optional($this)->updated_at ? Carbon::parse($this->updated_at)->toDateTimeString() : NULL
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
        /* If the resource has a throwable, return it. Otherwise, return false. */
        return [
            'meta' => [
                'throwable' => optional($this->resource)['throwable'] ? $this->resource['throwable'] : false,
            ],
        ];
    }
}
