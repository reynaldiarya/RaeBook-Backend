<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'auther' => $this->auther,
            'imgUrl' => $this->imgUrl,
            'score' => $this->score,
            'desc' => $this->desc,
            'review' => $this->review,
            'type' => TypeResource::collection($this->whenLoaded('types')),
            'view' => $this->view,
            'content' => $this->content,
        ];
    }
}
