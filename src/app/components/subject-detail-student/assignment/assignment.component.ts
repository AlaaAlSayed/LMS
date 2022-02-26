import { Component, enableProdMode, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { subject } from 'src/app/models/subject';
import { SubjectService } from 'src/app/services/subject.service';
import { AttachedAssignment } from 'src/app/models/AttachedAssignment';
import { assignment } from 'src/app/models/assignment';
import { assignmentsservice } from 'src/app/services/assignments.service';

enableProdMode();
@Component({
  selector: 'app-assignment',
  templateUrl: './assignment.component.html',
  styleUrls: ['./assignment.component.css']
})
export class AssignmentComponent implements OnInit {

  constructor( private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute,private _assignmentsservice:assignmentsservice) { }
  _subject:subject=new subject();
  _assignment:AttachedAssignment[]=[];
  _classassignment:assignment[]=[];
  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice. getSubjectByID(id)
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
getlink(assignid:number){
  let link ;
 this._assignmentsservice.getById(assignid).subscribe(
  (response:any)=>{
           link=response.data;
  },
  //(error:any)=>{alert("error in getlink");}

  );
  console.log(link);
  return link; 
}
  

}
