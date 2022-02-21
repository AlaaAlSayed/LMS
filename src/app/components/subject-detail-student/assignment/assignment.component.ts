import { assignment } from './../../../models/assignment';
import { Component, enableProdMode, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { subject } from 'src/app/models/subject';
import { subjectservice } from 'src/app/services/subject.service';
import { AttachedAssignment } from 'src/app/models/AttachedAssignment';

enableProdMode();
@Component({
  selector: 'app-assignment',
  templateUrl: './assignment.component.html',
  styleUrls: ['./assignment.component.css']
})
export class AssignmentComponent implements OnInit {

  constructor( private _subjectservice:subjectservice,private _activatedRoute:ActivatedRoute) { }
  _subject:subject=new subject();
  _assignment:AttachedAssignment[]=[];
  _classassignment:assignment[]=[];

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice.getById(id)
      .subscribe(
        (response:any)=>{
          this._subject=response.data;
          console.log(response.data);
        
      this._classassignment=this._subject.assignments;
    
        },
        (error:any)=>{alert("error");}
      )
            
          })

    
  }

  

}
