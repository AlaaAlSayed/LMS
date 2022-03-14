import { ClassroomService } from './../../../services/classroom.service';
import { Component, OnInit } from '@angular/core';
import { Classroom } from 'src/models/classroom';

@Component({
  selector: 'app-view-classrooms',
  templateUrl: './view-classrooms.component.html',
  styleUrls: ['./view-classrooms.component.css']
})
export class ViewClassroomsComponent implements OnInit {
  p: number = 1;
  count: number = 5;
  classrooms:Classroom[]=[];
  constructor(private _classroomService:ClassroomService) { }

  ngOnInit(): void {
    this._classroomService.get().subscribe (
      classroom=>{this.classrooms=classroom;
        // console.log(student);
      }
      )
  }
  deleteClass(id:number){
     this._classroomService.deleteClass(id).subscribe(
       response=>{
         this._classroomService.get().subscribe (
          classroom=>{this.classrooms=classroom;
          }
          )
         console.log(response);
       }
     )
  }
  }


