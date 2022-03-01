import { Subject } from './../../../../models/subject';
import { SubjectService } from '../../../services/subject.service';
import { Component, OnInit } from '@angular/core';
import { StudentService } from 'src/app/services/student.service';
import { Student } from './../../../../models/student';
import { ActivatedRoute, Router} from '@angular/router';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-student-home',
  templateUrl: './student-home.component.html',
  styleUrls: ['./student-home.component.css']
})
export class StudentHomeComponent implements OnInit {
   subjects:Subject[]=[];
   student= new Student();
  //  mySubject:Subject[]=[];

  constructor(private _subjectService:SubjectService, private _studentService:StudentService, private _activatedRoute:ActivatedRoute,private _router:Router,private http:HttpClient) { }

  ngOnInit(): void {
    // this._subjectService.get().subscribe (
    //   subject=>this.subjects=subject)
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
      this._studentService.getSubjects(id)
      .subscribe(
        response=>{
          this.subjects=response;
          console.log(this.subjects);
        },
      )
    }
    )
    // const headers= new HttpHeaders({
    //     'Authorization': `Bearer ${localStorage.getItem('token')}`
    //   });
    //   this.http.get('http://localhost:8000/api/students', {headers:headers}).subscribe
    //   (result=>{
        
    //     console.log(result);
    //   })
  }
}
