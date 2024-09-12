import { Component, OnInit } from '@angular/core';
import { StudentService } from '../../../services/student.service';
import { ActivatedRoute } from '@angular/router';
import { Student } from './../../../../models/student';
@Component({
  selector: 'app-details-student',
  templateUrl: './details-student.component.html',
  styleUrls: ['./details-student.component.css']
})
export class DetailsStudentComponent implements OnInit {
  myStudent:any= new Student();
  constructor(private _studentService:StudentService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._studentService.getStudentByID(id)
      .subscribe(
        response=>{
          this.myStudent=response;
        },
      )
    }
    )
  }

}
