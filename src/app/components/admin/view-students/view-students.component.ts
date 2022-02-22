import { Student } from 'src/models/student';
import { Component, OnInit } from '@angular/core';
import { StudentService } from './../../../services/student.service';

@Component({
  selector: 'app-view-students',
  templateUrl: './view-students.component.html',
  styleUrls: ['./view-students.component.css']
})
export class ViewStudentsComponent implements OnInit {
  students:Student[]=[];
  constructor(private _studentService:StudentService) { }

  ngOnInit(): void {
    this._studentService.get().subscribe (
      student=>{this.students=student;
        // console.log(student);
      }
      )
      console.log(this.students);
  }

}
