import { Component, OnInit } from '@angular/core';
import { TeacherService } from './../../../services/teacher.service';
import { Teacher } from 'src/models/teacher';
import { TeacherTeachesSubjects } from 'src/models/teacher_teaches_subjects';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-teacher-home',
  templateUrl: './teacher-home.component.html',
  styleUrls: ['./teacher-home.component.css'],
  
})

export class TeacherHomeComponent implements OnInit {
  // teacher:Teacher= new Teacher();
  // teachers:Teacher[]=[];
  teach:TeacherTeachesSubjects[]=[];
  // teach:any[]=[];
  constructor(private _teacherService:TeacherService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    // this._teacherService.get().subscribe (
    //   teacher=>this.teachers=teacher
    // )
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      this._teacherService.getClasses(id)
      .subscribe(
        response=>{
          this.teach=response;
          console.log(this.teach);
        },
      )
    })

      }
  }
  
