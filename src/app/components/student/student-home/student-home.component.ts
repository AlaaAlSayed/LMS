import { Subject } from './../../../../models/subject';
import { SubjectService } from '../../../services/subject.service';
import { Component, OnInit } from '@angular/core';
import { StudentService } from 'src/app/services/student.service';
import { Student } from './../../../../models/student';
import { ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-student-home',
  templateUrl: './student-home.component.html',
  styleUrls: ['./student-home.component.css']
})
export class StudentHomeComponent implements OnInit {
   subjects:Subject[]=[];
   student:any= new Student();
   mySubject=new Subject();

  constructor(private _subjectService:SubjectService, private _studentService:StudentService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._subjectService.get().subscribe (
      subject=>this.subjects=subject)
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._studentService.getStudentByID(id)
      .subscribe(
        response=>{
          this.student=response;
        },
      )
    }
    )
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._subjectService.getSubjectByID(id)
      .subscribe(
        response=>{
          this.mySubject=response;
        },
      )
    }
    )
  }
  // getStudentId(){
  //   this._activatedRoute.paramMap.subscribe( params=>{
  //     let id = Number(params.get('id'));
  //     this._studentService.getStudentByID(id)
  //     .subscribe(
  //       response=>{
  //         this.student=response;
  //       },
  //     )
  //   }
  //   )
  // }
  // getSubjectId(){
  //   this._activatedRoute.paramMap.subscribe( params=>{
  //     let id = Number(params.get('id'));
  //     this._subjectService.getSubjectByID(id)
  //     .subscribe(
  //       response=>{
  //         this.subject=response;
  //       },
  //     )
  //   }
  //   )
  // }
}
