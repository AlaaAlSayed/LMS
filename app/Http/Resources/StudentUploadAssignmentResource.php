<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentUploadAssignmentResource extends JsonResource
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
            'id' => $this->id ,
            'studentId' => $this->studentId ,
            'subjectId' => $this->subjectId ,
            'assignmentId'=> $this->assignmentId ,
            'answer'=> $this->answer ,
            'result'=> $this->result ,

            // 'student' => StudentUploadAssignmentResource::collection($this->student),
            // 'assignment' => StudentUploadAssignmentResource::collection($this->assignment),
            // 'subject' => StudentUploadAssignmentResource::collection($this->subject),

        ];
    }
}
