import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { SubjectService } from 'src/app/services/subject.service';
import { subject } from 'src/app/models/subject';
import { quiz } from 'src/app/models/quiz ';
import { quizservice } from 'src/app/services/quiz.service';

@Component({
  selector: 'app-quiz',
  templateUrl: './quiz.component.html',
  styleUrls: ['./quiz.component.css']
})
export class QuizComponent implements OnInit {

  constructor(private _quizservice:quizservice,private _activatedRoute:ActivatedRoute) { }
  _subject:subject=new subject();
  _quiz:quiz[]=[];
  ngOnInit(): void {

    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._quizservice.getexams(id)
      .subscribe(
        (response:any)=>{
          
      this._quiz=response;

        },
        (error:any)=>{alert("error");}
      )
            
          })


    
  }

}
