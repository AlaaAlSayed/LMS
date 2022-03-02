import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { AttachedAssignment } from 'src/app/models/AttachedAssignment';
import { assignmentsservice } from 'src/app/services/assignments.service';

@Component({
  selector: 'app-uploadassignment',
  templateUrl: './uploadassignment.component.html',
  styleUrls: ['./uploadassignment.component.css']
})
export class UploadassignmentComponent implements OnInit {
  formAdd = new FormGroup({});
  assignmentid:number=0;
  studentid:number=0;
  files:any;
  _assignment:AttachedAssignment=new AttachedAssignment();

  subjectid:number=0;
  constructor(private _assignmentservice:assignmentsservice,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.assignmentid=Number(params.get('assignmentid'));
      this.subjectid=Number(params.get('id'));
      this.studentid=Number(params.get('student_id'));
      console.log(this.studentid);
      console.log(this.subjectid); 
      console.log(this.assignmentid); 
    })
    this.formAdd = this._formBuilder.group({
      file:['' , [Validators.required]]
  
    })
  }
  uploadfile(event:any){
    this.files=event.target.files[0];
      // console.log(formData.get("material"));

  }
  uploadAssignment(){
    let formData= new FormData();
   formData.append("studentId",String (this.studentid));
   formData.append("answer",this.files, this.files.name);
   formData.append("assignmentId",String(this.assignmentid));

   formData.append("subjectId",String(this.subjectid));
   this._assignmentservice.postanswer(formData).subscribe(response=>{
    //this.files=response;
    console.log(this.files);
    window.location.href=`http://localhost:4200/subject/${this.studentid}/${this.subjectid}/assignment`;

  
  },
  //(error:any)=>{alert("error in post");}
  )

  }

}
