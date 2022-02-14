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
  student:Student= new Student();
  constructor(private _studentService:StudentService,private _activatedRoute:ActivatedRoute) { }

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
  }

}
