<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'name'=> $this->name,
            // 'classroomId'=> $this->classroomId,
            'classroom' => new ClassroomResource($this->classroom),
            'subjectMaterial' => SubjectMaterialResource::collection($this->subjectMaterial),
            'assignment' => AssignmentResource::collection($this->assignment),
            'exam' => ExamResource::collection($this->exam),
        ];

    }
}
