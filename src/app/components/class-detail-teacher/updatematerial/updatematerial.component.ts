import { MatrialService } from './../../../services/matrial.service';
import { matrial } from 'src/app/models/matrial';
import { Component, OnInit } from '@angular/core';
import { subject } from 'src/app/models/subject';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubjectService } from 'src/app/services/subject.service';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-updatematerial',
  templateUrl: './updatematerial.component.html',
  styleUrls: ['./updatematerial.component.css']
})
export class UpdatematerialComponent implements OnInit {
  matrials:matrial[]=[];
  _matrial:matrial=new matrial();
  classroomid:number=0;
  teacherid:number=0;
  subjectid:number=0;
  matrialid:number=0;
  files:any;
  backupfiles:any;
  data:any;
  isok:boolean=true;
    formAdd =new FormGroup({});
    constructor(private _matrialservice:MatrialService,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.matrialid=Number(params.get('matrialid'));
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })
    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      this.matrials=response;
this.subjectid=this.matrials[0].subjectId;

    }
  )
  this.formAdd = this._formBuilder.group({
    name:[this._matrial.name , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
    material:['' , [Validators.required]]

  })

this._matrialservice.getmatrialbyid(this.matrialid).subscribe((response:any)=>{
  this._matrial=response;
  //this._matrial.name=this.formAdd.value.name;
this.formAdd=new FormGroup({
  name:new FormControl(this._matrial.name),
  material:new FormControl(),

})
  console.log(this._matrial);

 

})

 
    
  }
  uploadfile(event:any){
    this.files=event.target.files[0];
  }
  uploadfileclick(){
    this.isok=false;
  }
 UpdateMatrial(){
  let formData= new FormData();
  // console.log(this.formAdd.value.name);
   formData.append("subjectId",String(this.subjectid));
   formData.append("name",this.formAdd.value.name);

   this._matrialservice.getfile(this.matrialid).subscribe(
    (response:any)=>{
      this.backupfiles = new Blob([response], {type: 'application/pdf'});
      if(this.files==null){
formData.append("material",this.backupfiles,this._matrial.name);
}
else{
  formData.append("material",this.files,this.files.name);

}
this._matrialservice.post(formData).subscribe(response=>{

  this._matrialservice.delete(this.matrialid).subscribe(response=>{
  });
  window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/matrial`;


}
)
    }
   );


 


 
  }

}
