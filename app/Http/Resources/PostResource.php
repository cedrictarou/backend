<?php

namespace App\Http\Resources;

use App\Models\Like;
use App\Models\User;
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


        return [
            'id' => $this->id,
            'content' => $this->content,
            'name' => $this->user->name,
            'likeCount' => $this->likes->count(),
            'isLikedBy' => $this->likes()->select('user_id')->get(),
        ];
    }
}
