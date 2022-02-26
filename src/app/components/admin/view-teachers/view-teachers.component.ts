import { TeacherTeachesSubjects } from 'src/models/teacher_teaches_subjects';
import { TeacherService } from './../../../services/teacher.service';
import { Component, OnInit } from '@angular/core';
import { Teacher } from 'src/models/teacher';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-view-teachers',
  templateUrl: './view-teachers.component.html',
  styleUrls: ['./view-teachers.component.css']
})
export class ViewTeachersComponent implements OnInit {
  teachers:Teacher[]=[];
  teach:TeacherTeachesSubjects[]= [];
  id:any;
  constructor(private _teacherService:TeacherService,private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._teacherService.get().subscribe (
      teacher=>{this.teachers=teacher;
        // console.log(student);
      }
      )
      // this._activatedRoute.paramMap.subscribe( params=>{
        // let id = Number(params.get('id'));
        this._teacherService.getTeacherSubjectClass()
        .subscribe(
          response=>{
            this.teach=response;
            // console.log(this.teach);
          },
        )
    // })
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
