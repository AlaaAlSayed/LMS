import { subject } from './../../../models/subject';
import { Component, OnInit } from '@angular/core';
import { SubjectService } from './../../../services/subject.service';
import { Subject } from 'src/models/subject';

@Component({
  selector: 'app-view-subjects',
  templateUrl: './view-subjects.component.html',
  styleUrls: ['./view-subjects.component.css']
})
export class ViewSubjectsComponent implements OnInit {
  p: number = 1;
  count: number = 5;
  subjects:Subject[]=[];
  constructor(private _subjectService:SubjectService) { }

  ngOnInit(): void {
    this._subjectService.get().subscribe (
      subject=>{this.subjects=subject;
      }
      )
  }
  deleteSubject(id:number){
    this._subjectService.deleteSubject(id).subscribe(
      response=>{
        this._subjectService.get().subscribe (
         subject=>{this.subjects=subject;
         }
         )
        console.log(response);
      }
    )
 }

}
