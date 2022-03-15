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
         
            'classroom' => new ClassroomResource($this->classroom),
            'subjectMaterial' => SubjectMaterialResource::collection($this->subjectMaterial),
            'assignments' => AssignmentResource::collection($this->assignments),
            'exams' => ExamResource::collection($this->exams),
            
            // 'exam' => ExamResource::collection($this->exam),
            // 'studentExam' => StudentTakeExamResource::collection($this->studentExam),
            'StudentsUploads' => StudentUploadAssignmentResource::collection($this->StudentsUploads),

        ];

    }
}
