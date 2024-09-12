import { TeacherService } from './../../../services/teacher.service';
import { Component, OnInit } from '@angular/core';
import { Teacher } from 'src/models/teacher';

@Component({
  selector: 'app-view-teachers',
  templateUrl: './view-teachers.component.html',
  styleUrls: ['./view-teachers.component.css']
})
export class ViewTeachersComponent implements OnInit {
  teachers:Teacher[]=[];
  constructor(private _teacherService:TeacherService) { }

  ngOnInit(): void {
    this._teacherService.get().subscribe (
      teacher=>{this.teachers=teacher;
        // console.log(student);
      }
      )
  }
  deleteTeacher(id:number){
    this._teacherService.deleteStudent(id).subscribe(
      response=>{
        this._teacherService.get().subscribe (
         teacher=>{this.teachers=teacher;
         }
         )
        console.log(response);
      }
    )
 }
}
