
import { subject } from 'src/app/models/subject';
import { Component, OnInit, Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { enableProdMode } from '@angular/core';
import { SubjectService } from 'src/app/services/subject.service';

enableProdMode();
@Component({
  selector: 'app-main-subject',
  templateUrl: './main-subject.component.html',
  styleUrls: ['./main-subject.component.css']
})
@Injectable()
export class MainSubjectComponent implements OnInit {


  _subject:subject=new subject();
title:string="";
id :number=0;

  constructor( private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {

    this._activatedRoute.paramMap.subscribe(params=>{
this.id=Number(params.get('id'));
let student_id=Number(params.get('student_id'));
console.log(this.id);

this._subjectservice. getSubjectByID(this.id)
.subscribe(
  (response:any)=>{
    this._subject=response.data;
    console.log(response.data);
    //console.log(this._subject.studentAssignment);

  },
  (error:any)=>{alert("error");}
)
      
    })

    
}

  

}




