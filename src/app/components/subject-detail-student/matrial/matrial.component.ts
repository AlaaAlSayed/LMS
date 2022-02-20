import { matrial } from './../../../models/matrial';
import { subject } from 'src/app/models/subject';
import { subjectservice } from './../../../services/subject.service';
import { Component, OnInit ,Injectable} from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-matrial',
  templateUrl: './matrial.component.html',
  styleUrls: ['./matrial.component.css']
})
export class MatrialComponent implements OnInit {

  constructor( private _subjectservice:subjectservice,private _activatedRoute:ActivatedRoute) { }
  _subject:subject=new subject();
  _matrial:matrial[]=[];

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice.getById(id)
      .subscribe(
        (response:any)=>{
          this._subject=response.data;
          console.log(response.data);
          console.log(this._subject.studentAssignment);
      this._matrial=this._subject.subjectMaterial;
        },
        (error:any)=>{alert("error");}
      )
            
          })

    
  }
  


}










