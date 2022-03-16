import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { getexam } from 'src/app/models/getexam';
import { quizservice } from 'src/app/services/quiz.service';

@Component({
  selector: 'app-doexaam',
  templateUrl: './doexaam.component.html',
  styleUrls: ['./doexaam.component.css']
})

export class DoexaamComponent implements OnInit {
exam :any;
quistions:any;
_quistions:any;
formAdd = new FormGroup({});
answers:number[]=[];
values:any;
options:any;
quesid:number=0;
l:number=0;
examId:number=0;


@Input()  currentIndex!: number | string;

  constructor(private _quizservice:quizservice,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {
    
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
     this.quesid=Number(params.get('quesid'));
     this.examId=Number(params.get('examid'));

      this._quizservice.doexam(this.examId)
      .subscribe(
        (response:any)=>{
          //console.log(response.data);
          console.log(response);
          this.exam=response;
          this._quistions=this.exam.quistions;
          this.l=this._quistions.length-1;
          console.log(this.l);
          this.quistions=this.exam.quistions[this.quesid];
          this.options=this.exam.options[this.quesid];
          this.values=this.exam.correctAnswers[this.quesid];
          console.log(this.values);

          console.log(this.quistions);
        },
        (error:any)=>{alert("error");}
      )
            
          })

          this.formAdd = this._formBuilder.group({
            correct:['']
        
          })


  }
  Next(){

    

    this._quizservice.doexam(this.examId)
    .subscribe(

      (response:any)=>{
        //console.log(response.data);
        this.exam=response;
        this._quistions=this.exam.quistions;
        this.l=this._quistions.length-1;
        this.quistions=this.exam.quistions[this.quesid];
        this.options=this.exam.options[this.quesid];
        this.values=this.exam.correctAnswers[this.quesid];

      },
      (error:any)=>{alert("error");}
    )
      console.log(this.answers)    
      this.answers[this.quesid]=this.formAdd.value.correct;
      this.quesid=this.quesid+1;
  }
  Previous(){

    this.answers[this.quesid]=this.formAdd.value.correct;

    this.quesid=this.quesid-1;
    this._quizservice.doexam(this.examId)
    .subscribe(
      (response:any)=>{
        this.exam=response;
        this._quistions=this.exam.quistions;
        this.l=this._quistions.length-1;
        this.quistions=this.exam.quistions[this.quesid];
        this.options=this.exam.options[this.quesid];
        this.values=this.exam.correctAnswers[this.quesid];

      },
      (error:any)=>{alert("error");}
    )
          
    console.log(this.answers)    
 
  }

}
