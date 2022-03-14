import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { matrial } from 'src/app/models/matrial';
import { quiz } from 'src/app/models/quiz ';
import { subject } from 'src/app/models/subject';
import { MatrialService } from 'src/app/services/matrial.service';
import { quizservice } from 'src/app/services/quiz.service';
import { SubjectService } from 'src/app/services/subject.service';

@Component({
  selector: 'app-techquiz',
  templateUrl: './techquiz.component.html',
  styleUrls: ['./techquiz.component.css']
})
export class TechquizComponent implements OnInit {
  classroomid:number=0;
  teacherid:number=0;
  matrials:matrial[]=[];
  subjectid:number=0;
  _subject:subject=new subject();
  _quiz:quiz[]=[];
  constructor(private _quizservice:quizservice,private _matrialservice:MatrialService,private _activatedRoute:ActivatedRoute,private _subjectservice:SubjectService) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })

    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      
      this.matrials=response;
      this.subjectid=this.matrials[0].subjectId;
      this._quizservice.getexams(this.subjectid)
      .subscribe(
        (response:any)=>{
          
      this._quiz=response;
      console.log(this._quiz)
    
        },
        (error:any)=>{alert("error");}
      )
    
  })

 
        
      


  }
  delete(id:number,current:number){
    this._quizservice.delete(id).subscribe(
      (response:any)=>{
        this._quiz.splice(current,1);
      },
      (error:any)=>{alert("error");}
    )
      }
}
