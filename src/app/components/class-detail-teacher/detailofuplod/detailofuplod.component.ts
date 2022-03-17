import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { assignmentsservice } from 'src/app/services/assignments.service';
import { MatrialService } from 'src/app/services/matrial.service';
import { StudentService } from 'src/app/services/student.service';
import { SubjectService } from 'src/app/services/subject.service';

@Component({
  selector: 'app-detailofuplod',
  templateUrl: './detailofuplod.component.html',
  styleUrls: ['./detailofuplod.component.css']
})
export class DetailofuplodComponent implements OnInit {
  formAdd = new FormGroup({});

  constructor(private _formBuilder:FormBuilder,private _activatedRoute:ActivatedRoute,private _assignmentsservice:assignmentsservice,private _matrialservice:MatrialService,private _studentService:StudentService) { }
upid:number=0;
classroomid:number=0;
teacherid:number=0;
assignmentid:number=0;
path:any;
  ngOnInit(): void {

    this._activatedRoute.paramMap.subscribe(params=>{
      this.upid=Number(params.get('upid'));
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      this.assignmentid=Number(params.get('assignmentid'));

    })
    this.formAdd = this._formBuilder.group({
      Degree:['' , [Validators.required]],
  
    })
  }
  insertresult(){
    let formData= new FormData();
   formData.append("result",this.formAdd.value.Degree);
   
   this._assignmentsservice.putresult(this.upid,formData).subscribe(response=>{
    
    //console.log(this.files);
    window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment/uploasassignment/${this.assignmentid}`;

  
  },
  //(error:any)=>{alert("error in post");}
  )

  }
}
