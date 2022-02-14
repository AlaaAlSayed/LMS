import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Teacher } from 'src/models/teacher';
import { TeacherService } from './../../../services/teacher.service';
import { HttpClient } from '@angular/common/http';


@Component({
  selector: 'app-teacher-profile',
  templateUrl: './teacher-profile.component.html',
  styleUrls: ['./teacher-profile.component.css']
})
export class TeacherProfileComponent implements OnInit {

  teacher:Teacher= new Teacher();
  constructor(private _teacherService:TeacherService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
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

  }

}
