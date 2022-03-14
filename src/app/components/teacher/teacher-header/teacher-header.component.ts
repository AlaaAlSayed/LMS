import { Component, OnInit } from '@angular/core';
import { Teacher } from 'src/models/teacher';
import { TeacherService } from './../../../services/teacher.service';
import { ActivatedRoute } from '@angular/router';
import { Notifications } from 'src/models/notifications';
import { StudentService } from './../../../services/student.service';


@Component({
  selector: 'app-teacher-header',
  templateUrl: './teacher-header.component.html',
  styleUrls: ['./teacher-header.component.css']
})
export class TeacherHeaderComponent implements OnInit {
  teacher:Teacher= new Teacher();
  notifications:Notifications[]=[];
  constructor(private _teacherService:TeacherService,private _activatedRoute:ActivatedRoute,private _studentService:StudentService) { }

  ngOnInit(): void {
    // this._teacherService.get().subscribe (
    //   teacher=>this.teachers=teacher
    // )
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._teacherService.getTeacherByID(id)
      // this._httpClient.get(`http://127.0.0.1:8000/api/teachers/${id}`)

      .subscribe(
        response=>{
          this.teacher=response;
        },
      )
    }

    )
    this._studentService.getNotification().subscribe(result=>{
      this.notifications=result;
      console.log(result);

    })
  }

}
