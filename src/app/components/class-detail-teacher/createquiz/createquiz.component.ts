import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { info_quiz } from 'src/app/models/info_quiz';
import { quiz } from 'src/app/models/quiz ';
import { MatrialService } from 'src/app/services/matrial.service';
import { quizservice } from 'src/app/services/quiz.service';

@Component({
  selector: 'app-createquiz',
  templateUrl: './createquiz.component.html',
  styleUrls: ['./createquiz.component.css']
})
export class CreatequizComponent implements OnInit {
  formAdd = new FormGroup({});
   quiz:quiz[]=[];
   

   classroomid:number=0;
  teacherid:number=0;
  subjectid:number=0;
  quizid:number=0;
  _quiz:any;
  //res:any;
  constructor(private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder,private _matrialservice:MatrialService,private _examservice:quizservice) { }
  
  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      
      /* console.log(this.classroomid);
      console.log(this.teacherid); */
    })


    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      this.quiz=response;
       this.subjectid=this.quiz[0].subjectId;
      console.log(this.subjectid);
      //console.log(this._subject.studentAssignment);
  
    },
    (error:any)=>{alert("error");}
    )
  this.formAdd = this._formBuilder.group({
    name:['' , [Validators.required]],

    min_score:['' , [Validators.required]],
    date:['' , [Validators.required]],
    time:['' , [Validators.required]]


  })

  }
  insertquiz(){
    let formData= new FormData();
   formData.append("min_score",this.formAdd.value.min_score);
   formData.append("time",this.formAdd.value.time);
   formData.append("date",this.formAdd.value.date);
   //formData.append("examId",this.formAdd.value.examId);
   formData.append("name",this.formAdd.value.name);

   //formData.append("teacherId",String(this.teacherid));
   //formData.append("subjectId",String(this.subjectid));
   this._examservice.postquiz(formData,this.teacherid,this.subjectid).subscribe(
     response=>{
       console.log(response);
    this._quiz=response;
    console.log( this._quiz.exam_name);
    console.log(this._quiz.teacher_makes_exams);
  window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/quiz/createquiz/${this._quiz.teacher_makes_exams}/${this._quiz.exam_name}/createquestion`;

  }
  );

}




}
