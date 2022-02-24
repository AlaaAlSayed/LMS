import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { SubjectService } from './../../../services/subject.service';
@Component({
  selector: 'app-edit-subject',
  templateUrl: './edit-subject.component.html',
  styleUrls: ['./edit-subject.component.css']
})
export class EditSubjectComponent implements OnInit {
  id:any;
  formEdit = new FormGroup({
    name:new FormControl(''),
    classroomId:new FormControl(),
    })
  constructor(private _subjectService:SubjectService, private _formBuilder:FormBuilder, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      this.id = Number(params.get('id'));
      this._subjectService.getSubject(this.id).subscribe(
        response=>{
            this.formEdit=new FormGroup({
              name:new FormControl(response['name']),
              classroomId:new FormControl(response['classroomId']),
            })
          },
        )
  })
    }
    updateSubject(){
      this._subjectService.updateData(this.id, this.formEdit.value).subscribe(response=>{
        console.log(response, 'updated Successfully');
        alert('updated successfully');
      }
      )
    }
  }

