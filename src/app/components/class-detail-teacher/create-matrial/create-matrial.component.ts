import { MatrialService } from './../../../services/matrial.service';
import { matrial } from 'src/app/models/matrial';
import { Component, OnInit } from '@angular/core';
import { subject } from 'src/app/models/subject';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubjectService } from 'src/app/services/subject.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-create-matrial',
  templateUrl: './create-matrial.component.html',
  styleUrls: ['./create-matrial.component.css']
})
export class CreateMatrialComponent implements OnInit {
  matrials:matrial[]=[];
  classroomid:number=0;
  teacherid:number=0;
  subjectid:number=0;
  files:any;
  data:any;
    formAdd = new FormGroup({});

  constructor(private _matrialservice:MatrialService,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      /* console.log(this.classroomid);
      console.log(this.teacherid); */
    })
    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      this.matrials=response;
this.subjectid=this.matrials[0].subjectId;
      //console.log(this.subjectid);
      //console.log(this._subject.studentAssignment);
  
    },
    (error:any)=>{alert("error");}
  )
  this.formAdd = this._formBuilder.group({
    name:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
    file:['' , [Validators.required]]

  })



  }
  uploadfile(event:any){
    this.files=event.target.files[0];
      // console.log(formData.get("material"));

  }
  insertMatrial(){
    let formData= new FormData();
   formData.append("name",this.formAdd.value.name);
   formData.append("material",this.files, this.files.name);
   formData.append("subjectId",String(this.subjectid));
   this._matrialservice.post(formData).subscribe(response=>{
    this.files=response;
    //console.log(this.files);
    window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/matrial`;

  
  },
  (error:any)=>{alert("error in post");}
  )

  }

}
