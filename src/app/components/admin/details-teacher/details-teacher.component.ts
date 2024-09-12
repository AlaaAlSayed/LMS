import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Teacher } from 'src/models/teacher';
import { TeacherService } from './../../../services/teacher.service';

@Component({
  selector: 'app-details-teacher',
  templateUrl: './details-teacher.component.html',
  styleUrls: ['./details-teacher.component.css']
})
export class DetailsTeacherComponent implements OnInit {

  teacher:Teacher= new Teacher();
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
  })
}
}
