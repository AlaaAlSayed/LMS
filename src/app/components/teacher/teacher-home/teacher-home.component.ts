import { Component, OnInit } from '@angular/core';
import { TeacherService } from './../../../services/teacher.service';
import { Teacher } from 'src/models/teacher';

@Component({
  selector: 'app-teacher-home',
  templateUrl: './teacher-home.component.html',
  styleUrls: ['./teacher-home.component.css'],
  
})

export class TeacherHomeComponent implements OnInit {
  // teacher:Teacher= new Teacher();
  teachers:Teacher[]=[];
  constructor(private _teacherService:TeacherService) { }

  ngOnInit(): void {
    this._teacherService.get().subscribe (
      teacher=>this.teachers=teacher
    )
    
  }
  

}
