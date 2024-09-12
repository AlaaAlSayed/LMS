<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
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
            'level'=> $this->level,
            'capacity'=> $this->capacity,
            'time_table' => $this->time_table,
            // 'student' => StudentResource::collection($this->student),
            
            // hasMany(Subject::class);
        ];
    }
}
