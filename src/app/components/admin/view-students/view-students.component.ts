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
  // Pagination parameters.
  p: number = 1;
  count: number = 5;
  constructor(private _studentService:StudentService) { }

  ngOnInit(): void {
    this._studentService.get().subscribe (
      student=>{this.students=student;
        // console.log(student);
      }
      )
  }
  deleteStudent(id:number){
     this._studentService.deleteStudent(id).subscribe(
       response=>{
         this._studentService.get().subscribe (
          student=>{this.students=student;
          }
          )
         console.log(response);
       }
     )
  }

}
