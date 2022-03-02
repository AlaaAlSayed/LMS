import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { matrial } from 'src/app/models/matrial';
import { subject } from 'src/app/models/subject';
import { MatrialService } from 'src/app/services/matrial.service';
import { SubjectService } from 'src/app/services/subject.service';

@Component({
  selector: 'app-techmatrial',
  templateUrl: './techmatrial.component.html',
  styleUrls: ['./techmatrial.component.css']
})
export class TechmatrialComponent implements OnInit {
  classroomid:number=0;
  teacherid:number=0;
  matrials:matrial[]=[];
  subjectid:number=0;
  _subject:subject=new subject();
  _matrial:matrial[]=[];
  constructor(private _matrialservice:MatrialService,private _activatedRoute:ActivatedRoute,private _subjectservice:SubjectService) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })

    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      
      this.matrials=response;
      this.subjectid=this.matrials[0].subjectId;

      this._subjectservice.getSubjectByID(this.subjectid)
      .subscribe(
        (response:any)=>{
         // console.log(this.subjectid);

          this._subject=response.data;
        
      this._matrial=this._subject.subjectMaterial;
      console.log(response.data);
        }  

           )    }
  )
  }
  redirect(id:number){
    this._matrialservice.show(id).subscribe(
      (response:any)=>{
    window.open (response,'_blank') ;
      },
      (error:any)=>{alert("error");}
    )
      }
      delete(id:number,current:number){
        this._matrialservice.delete(id).subscribe(
          (response:any)=>{
            this._matrial.splice(current,1);
          },
          (error:any)=>{alert("error");}
        )
          }

}
