import { HttpClient, HttpHeaders } from '@angular/common/http';
import { StudentService } from './../../../services/student.service';
import { Component, OnInit } from '@angular/core';
import { Student } from 'src/models/student';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
user:Student[]=[];
  constructor(private _studentService:StudentService,private http:HttpClient) { }

  ngOnInit(): void {
    // const headers= new HttpHeaders({
    //   'Authorization': `Bearer ${localStorage.getItem('token')}`
    // });
    // this.http.get('http://localhost:8000/api/students', {headers:headers}).subscribe
    // (result=>{
      
    //   console.log(result);
    // })
  }

}
