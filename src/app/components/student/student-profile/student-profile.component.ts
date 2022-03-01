import { Student } from './../../../../models/student';
import { Component, OnInit } from '@angular/core';
import { StudentService } from '../../../services/student.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-student-profile',
  templateUrl: './student-profile.component.html',
  styleUrls: ['./student-profile.component.css']
})
export class StudentProfileComponent implements OnInit {
  student:any= new Student();
  data:any;
  constructor(private _studentService:StudentService, private _activatedRoute:ActivatedRoute) { }
  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._studentService.getStudentByID(id)
      .subscribe(
        response=>{
          this.student=response;
        },
      )
      this._studentService.getImage(id).subscribe(data=>{
        this.data=data;
        console.log(this.data);
      }, error => console.error(error)
      );
    }
    )
    // const headers= new HttpHeaders({
    //       'Authorization': `Bearer ${localStorage.getItem('token')}`
    //     });
    //     this.http.get('http://localhost:8000/api/students', {headers:headers}).subscribe
    //     (result=>{
          
    //       console.log(result);
    //     })
  }

}
