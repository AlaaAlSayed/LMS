import { quiz } from './../../../models/quiz ';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { subjectservice } from 'src/app/services/subject.service';
import { subject } from 'src/app/models/subject';

@Component({
  selector: 'app-quiz',
  templateUrl: './quiz.component.html',
  styleUrls: ['./quiz.component.css']
})
export class QuizComponent implements OnInit {

  constructor(private _subjectservice:subjectservice,private _activatedRoute:ActivatedRoute) { }
  _subject:subject=new subject();
  _quiz:quiz[]=[];
  ngOnInit(): void {

    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice.getById(id)
      .subscribe(
        (response:any)=>{
          this._subject=response.data;
          //console.log(response.data);
          console.log(this._subject.exams);
      this._quiz=this._subject.exams;

        },
        (error:any)=>{alert("error");}
      )
            
          })


    
  }

}
