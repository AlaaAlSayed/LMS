import { Component, OnInit, Optional } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { choices } from 'src/app/models/choices';
import { question } from 'src/app/models/question';
import { quiz } from 'src/app/models/quiz ';
//import { option } from 'src/app/models/option ';

import { MatrialService } from 'src/app/services/matrial.service';
import { quizservice } from 'src/app/services/quiz.service';

@Component({
  selector: 'app-createquestion',
  templateUrl: './createquestion.component.html',
  styleUrls: ['./createquestion.component.css']
})
export class CreatequestionComponent implements OnInit {
  formAdd = new FormGroup({});
  quiz:quiz[]=[];
  classroomid:number=0;
 teacherid:number=0;
 subjectid:number=0;
 quesid:number=0;

question:any[]=[];
options:choices[]=[];
option:choices=new choices();
 quizid:number=0;
 quiz_name:string="";
 _quiz:any;
 isok:boolean=true;
 anotheropt:boolean=true;
 anotherbutton:boolean=true;

  constructor(private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder,private _matrialservice:MatrialService,private _examservice:quizservice) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      this.quizid=Number(params.get('quizid'));
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
    )
    this.formAdd = this._formBuilder.group({
      question:['' , [Validators.required]],
  
      option:['' , [Validators.required]],
      correct:['' , [Validators.required]]
  
  
    })
    //console.log(this.formAdd.get('correct'));

  }
  insertques(){
    let formData= new FormData();
     //formData.append("examId",this.formAdd.value.examId);
   formData.append("value",this.formAdd.value.question);
   let k=this.formAdd.value.question;
   formData.append("examId",String(this.quizid));
   formData.append("subjectId",String(this.subjectid));
   this._examservice.postquestion(formData,this.quizid,this.subjectid).subscribe(
     response=>{
     this._quiz=response;
     this.quesid=this._quiz;
     //console.log(this.quesid);
  
  window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/quiz/createquiz/${this.quizid}/${this.quiz_name}/createquestion/${this.quesid}/createoption`;
    this.question.push(k);
    //console.log( this.question);
  }
  );



}
/* createques(){
  this.isok=true;
  this.anotherbutton=true;

}

createoption(){
  let formData= new FormData();
formData.append("value",this.formAdd.value.option);

formData.append("is_correct",this.formAdd.value.correct);
formData.append("quistionId",String(this._quiz));
this.option.value=this.formAdd.value.option;
this.option.is_correct=this.formAdd.value.correct;
this.options.push(this.option);
console.log(this.options)

this._examservice.postoption(formData,this._quiz).subscribe(
  response=>{
  this._quiz=response;
  console.log(this._quiz);
  this.anotheropt=true;
this.anotherbutton=false;
 
 
}
); 

} */
/* anotheroption(){
  this.anotheropt=false;
  this.anotherbutton=true;
  this.formAdd = this._formBuilder.group({
    question:['' , [Validators.required]],

    option:['' , [Validators.required]],
    correct:['' , [Validators.required]]


  })
 
} */

}
