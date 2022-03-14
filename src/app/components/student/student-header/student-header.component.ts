import { SubjectService } from 'src/app/services/subject.service';
import { Subject } from 'src/models/subject';
import { Student } from './../../../../models/student';
import { Component, OnInit } from '@angular/core';
import { StudentService } from './../../../services/student.service';
import { ActivatedRoute } from '@angular/router';
import { Notifications } from 'src/models/notifications';


@Component({
  selector: 'app-student-header',
  templateUrl: './student-header.component.html',
  styleUrls: ['./student-header.component.css']
})
export class StudentHeaderComponent implements OnInit {
  // isLogged=false;
  student:any= new Student();
  subjects:Subject[]=[];
  notifications:Notifications[]=[];
  constructor(private _studentService:StudentService,private _activatedRoute:ActivatedRoute,private _subjectService:SubjectService) { }

  ngOnInit(): void {

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
    // this._userService.logged.subscribe(status=>{
    //   this.isLogged=status;
    // })
    this._studentService.getNotification().subscribe(result=>{
      this.notifications=result;
      console.log(result);

    })
  }

}
