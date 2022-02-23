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
  data:any;
  constructor(private _teacherService:TeacherService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._teacherService.getTeacherByID(id)
      .subscribe(
        response=>{
          this.teacher=response;
        },
      )
      this._teacherService.getImage(id).subscribe( data=>{
          this.data=data;
          console.log(this.data);
        }, error => console.error(error)
      )
    }

    )

  }

}
