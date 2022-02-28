import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { assignment } from 'src/app/models/assignment';
import { subject } from 'src/app/models/subject';
import { assignmentsservice } from 'src/app/services/assignments.service';
import { MatrialService } from 'src/app/services/matrial.service';
import { SubjectService } from 'src/app/services/subject.service';

@Component({
  selector: 'app-techassignment',
  templateUrl: './techassignment.component.html',
  styleUrls: ['./techassignment.component.css']
})
export class TechassignmentComponent implements OnInit {

  classroomid:number=0;
  teacherid:number=0;
  assignments:assignment[]=[];
  subjectid:number=0;
  _subject:subject=new subject();
  _assignment:assignment[]=[];
  constructor(private _assignmentservice:assignmentsservice,private _activatedRoute:ActivatedRoute,private _subjectservice:SubjectService,private _matrialservice:MatrialService) { }


  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })


    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      
      this.assignments=response;
      this.subjectid=this.assignments[0].subjectId;

      this._subjectservice.getSubjectByID(this.subjectid)
      .subscribe(
        (response:any)=>{
         // console.log(this.subjectid);

          this._subject=response.data;
        
      this._assignment=this._subject.assignments;
      console.log(response.data);
        }  

           )    }
  )
  }
  redirect(id:number){
    this._assignmentservice.show(id).subscribe(
      (response:any)=>{
    window.open (response,'_blank') ;
      },
      (error:any)=>{alert("error");}
    )
      }
      delete(id:number,current:number){
        this._assignmentservice.delete(id).subscribe(
          (response:any)=>{
            this._assignment.splice(current,1);
          },
          (error:any)=>{alert("error");}
        )
          }


}
