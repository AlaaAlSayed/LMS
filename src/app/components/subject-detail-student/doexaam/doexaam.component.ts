import { Component, Input, OnInit } from '@angular/core';
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
options:any;
@Input()  currentIndex!: number | string;

  constructor(private _quizservice:quizservice,private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      let examId=Number(params.get('examid'));

      this._quizservice.doexam(examId)
      .subscribe(
        (response:any)=>{
          //console.log(response.data);
          //console.log(response);
          this.exam=response;
          this.quistions=this.exam.quistions;
          this.options=this.exam.options;
          console.log(this.exam);

          console.log(this.quistions);
        },
        (error:any)=>{alert("error");}
      )
            
          })


  }

}
