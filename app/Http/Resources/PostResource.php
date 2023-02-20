<?php

namespace App\Http\Resources;

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
    private $current_user_id;

    public function __construct($resource, $current_user_id)
    {
        parent::__construct($resource);
        $this->current_user_id = $current_user_id;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'name' => optional($this->user)->name,
            'likeCount' => $this->likes->count(),
            // 'likedByUser' => $this->likes()->where('user_id', $this->current_user_id)->exists(),
            'likedByUser' => $this->likes()->get(),
            // 'likes' => $this->likes,
        ];
    }
}
