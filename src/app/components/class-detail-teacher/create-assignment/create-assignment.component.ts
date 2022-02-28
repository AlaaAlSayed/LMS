import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { assignment } from 'src/app/models/assignment';
import { assignmentsservice } from 'src/app/services/assignments.service';
import { MatrialService } from 'src/app/services/matrial.service';

@Component({
  selector: 'app-create-assignment',
  templateUrl: './create-assignment.component.html',
  styleUrls: ['./create-assignment.component.css']
})
export class CreateAssignmentComponent implements OnInit {
  assignments:assignment[]=[];
  classroomid:number=0;
  teacherid:number=0;
  subjectid:number=0;
  files:any;
  data:any;
    formAdd = new FormGroup({});
  constructor(private _matrialservice:MatrialService,private _assignmentservice:assignmentsservice,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
      /* console.log(this.classroomid);
      console.log(this.teacherid); */
    })

    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      this.assignments=response;
this.subjectid=this.assignments[0].subjectId;
      //console.log(this.subjectid);
      //console.log(this._subject.studentAssignment);
  
    },
    (error:any)=>{alert("error");}
  )
  this.formAdd = this._formBuilder.group({
    deadline:['' , [Validators.required]],
    file:['' , [Validators.required]]

  })
  }
  uploadfile(event:any){
    this.files=event.target.files[0];
      // console.log(formData.get("material"));

  }
  insertAaaignment(){
    let formData= new FormData();
   formData.append("deadline",this.formAdd.value.deadline);
   formData.append("name",this.files, this.files.name);
   formData.append("teacherId",String(this.teacherid));

   formData.append("subjectId",String(this.subjectid));
   this._assignmentservice.post(formData,this.teacherid,this.subjectid).subscribe(response=>{
    this.files=response;
    //console.log(this.files);
    window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment`;

  
  },
  //(error:any)=>{alert("error in post");}
  )

  }

}
