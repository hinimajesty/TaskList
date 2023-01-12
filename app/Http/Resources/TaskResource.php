<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'id' => $this->id, //use uuid, if actual app
            'title' => $this->title,
            'description' => $this->description,
            'task_list_id' => $this->task_list_id,
            'created_at' => $this->created_at,
        ];
    }
}
