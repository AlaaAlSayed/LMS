import { ClassroomService } from './../../../services/classroom.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Classroom } from 'src/models/classroom';
@Component({
  selector: 'app-add-classroom',
  templateUrl: './add-classroom.component.html',
  styleUrls: ['./add-classroom.component.css']
})
export class AddClassroomComponent implements OnInit {
  formAdd = new FormGroup({}) 
  classes:Classroom[]=[]
  constructor(private _formBuilder:FormBuilder, private _classroomService:ClassroomService) { }

  ngOnInit(): void {
    this._classroomService.get().subscribe (
      classroom=>{this.classes=classroom;
      }
      )
    this.formAdd = this._formBuilder.group({
      id:[''],
      level:[''],
      code:[''],
      capacity:[''],
      // time_table:[''],

    })
  }
  insertClassroom(level:number, code:number, capacity:number){
    let classroom=new Classroom();
    classroom.level=level;
    classroom.code=code;
    classroom.capacity=capacity;
    // classroom.time_table=time_table;
    this._classroomService.post(classroom).subscribe(response=>{
      console.log(this.classes);
      this.classes.push(classroom);
    })
  }

}
