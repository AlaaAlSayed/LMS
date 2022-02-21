import { Subject } from './../../../../models/subject';
import { SubjectService } from '../../../services/subject.service';
import { Component, OnInit } from '@angular/core';
import { StudentService } from 'src/app/services/student.service';

@Component({
  selector: 'app-student-home',
  templateUrl: './student-home.component.html',
  styleUrls: ['./student-home.component.css']
})
export class StudentHomeComponent implements OnInit {
   subjects:Subject[]=[];
  constructor(private _subjectService:SubjectService, private _studentService:StudentService) { }

  ngOnInit(): void {
    this._subjectService.get().subscribe (
      subject=>this.subjects=subject
    )
  }
}
