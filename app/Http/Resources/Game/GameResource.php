<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\GameCategory\GameCategoryResource;
use App\Http\Resources\GameTag\GameTagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,         
            'category_id' => $this->category_id, 
            'category' => new GameCategoryResource($this->category),        
            'tags' => GameTagResource::collection($this->tags),

        ];
    }
}
