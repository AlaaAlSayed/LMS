import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { choices } from 'src/app/models/choices';
import { quiz } from 'src/app/models/quiz ';
import { MatrialService } from 'src/app/services/matrial.service';
import { quizservice } from 'src/app/services/quiz.service';

@Component({
  selector: 'app-createoption',
  templateUrl: './createoption.component.html',
  styleUrls: ['./createoption.component.css']
})
export class CreateoptionComponent implements OnInit {
  formAdd = new FormGroup({});
  quiz:quiz[]=[];
  classroomid:number=0;
 teacherid:number=0;
 subjectid:number=0; 
 quizid:number=0;
 quesid:number=0;
 options:choices[]=[];
option:choices=new choices();
isappear :boolean=true;
quiz_name:string="";

  constructor(private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder,private _matrialservice:MatrialService,private _examservice:quizservice) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      this.quizid=Number(params.get('quizid'));
      this.quesid=Number(params.get('questionid'));
      this.quiz_name=String(params.get('quizname'));


    })
    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      this.quiz=response;
       this.subjectid=this.quiz[0].subjectId;
      //console.log(this.subjectid);
      //console.log(this._subject.studentAssignment);
  
    },
    (error:any)=>{alert("error");}
    );
    this.formAdd = this._formBuilder.group({
      question:['' , [Validators.required]],
  
      option:['' , [Validators.required]],
      correct:['' , [Validators.required]]
  
  
    })
  }
  createoption(){
    let formData= new FormData();
    //formData.append("examId",this.formAdd.value.examId);
  formData.append("value",this.formAdd.value.option);
  
  formData.append("is_correct",this.formAdd.value.correct);
  formData.append("quistionId",String(this.quesid));
  this.option.value=this.formAdd.value.option;
  this.option.is_correct=this.formAdd.value.correct;
  this.options.push(this.option);
  console.log(this.options)
  
  this._examservice.postoption(formData,this.quesid).subscribe(
    response=>{
  }
  );
  this.isappear=false;
  }
  createanotherques(){
    window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/quiz/createquiz/${this.quizid}/${this.quiz_name}/createquestion`;

  }
  createanotheroption(){
    this.isappear=true;
    this.formAdd = this._formBuilder.group({
  
      option:['' , [Validators.required]],
      correct:['' , [Validators.required]]
  
  
    })
  }
  finish(){
    window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/quiz`;

  }
}
