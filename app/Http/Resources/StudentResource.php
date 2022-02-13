<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email'=> $this->email,
            'phone' => $this->phone,
           
            'picture_path' => $this->picture_path,
            'classroomId'=> $this->classroomId,
            'government'=> $this->government,
            'city'=> $this->city,
            'street'=> $this->street,

            'classroom' => new ClassroomResource($this->classroom),
            //hasMany(Transaction::class);
        
        ];
    }
}
