import { subject } from './../../../models/subject';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Subject } from 'src/models/subject';
import { SubjectService } from './../../../services/subject.service';

@Component({
  selector: 'app-add-subject',
  templateUrl: './add-subject.component.html',
  styleUrls: ['./add-subject.component.css']
})
export class AddSubjectComponent implements OnInit {
  formAdd = new FormGroup({}) 
  subjects:Subject[]=[]
  constructor(private _formBuilder:FormBuilder, private _subjectService:SubjectService) { }

  ngOnInit(): void {
    this._subjectService.get().subscribe (
      subject=>{this.subjects=subject;
      }
      )
    this.formAdd = this._formBuilder.group({
      id:[''],
      name:[''],
      classroomId:[''],
    })
  }
  insertSubject(name:string, classroomId:number){
    let subject=new Subject();
    subject.name=name;
    subject.classroomId=classroomId;

    this._subjectService.post(subject).subscribe(response=>{
      console.log(this.subjects);
      this.subjects.push(subject);
      alert('Added Successfully');
    })
  }

}
