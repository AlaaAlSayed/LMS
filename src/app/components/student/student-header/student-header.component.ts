import { UserService } from 'src/app/services/user.service';
import { Student } from './../../../../models/student';
import { Component, OnInit } from '@angular/core';
import { StudentService } from './../../../services/student.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-student-header',
  templateUrl: './student-header.component.html',
  styleUrls: ['./student-header.component.css']
})
export class StudentHeaderComponent implements OnInit {
  isLogged=false;
  student:any= new Student();
  constructor(private _studentService:StudentService,private _activatedRoute:ActivatedRoute
    , private _userService:UserService) { }

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
    this._userService.logged.subscribe(status=>{
      this.isLogged=status;
    })
  }

}
