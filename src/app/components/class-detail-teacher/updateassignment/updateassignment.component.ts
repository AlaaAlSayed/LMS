import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { assignment } from 'src/app/models/assignment';
import { matrial } from 'src/app/models/matrial';
import { assignmentsservice } from 'src/app/services/assignments.service';
import { MatrialService } from 'src/app/services/matrial.service';

@Component({
  selector: 'app-updateassignment',
  templateUrl: './updateassignment.component.html',
  styleUrls: ['./updateassignment.component.css']
})
export class UpdateassignmentComponent implements OnInit {
  matrials:matrial[]=[];
  _assignment:assignment=new assignment();
  classroomid:number=0;
  teacherid:number=0;
  subjectid:number=0;
  assignmentid:number=0;
  files:any;
  backupfiles:any;
  data:any;
  isok:boolean=true;
    formAdd =new FormGroup({});
    constructor(private _matrialservice:MatrialService,private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder,private _assignmentservice:assignmentsservice) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.assignmentid=Number(params.get('assignmentid'));
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
    deadline:[this._assignment.deadline , [Validators.required]],
    assignment:['' , [Validators.required]]

  })

  this._assignmentservice.getById(this.assignmentid).subscribe((response:any)=>{
    this._assignment=response;
    //this._matrial.name=this.formAdd.value.name;
  this.formAdd=new FormGroup({
    deadline:new FormControl(this._assignment.deadline),
    assignment:new FormControl(),
  
  })
    console.log(this._assignment);
  
   
  
  }) 
  }
  uploadfile(event:any){
    this.files=event.target.files[0];
  }
  uploadfileclick(){
    this.isok=false;
  }
  UpdateAssignment(){
  let formData= new FormData();
  // console.log(this.formAdd.value.name);
   formData.append("subjectId",String(this.subjectid));
   formData.append("deadline",this.formAdd.value.deadline);
   formData.append("teacherId",String(this.teacherid));

   this._matrialservice.getfile(this.assignmentid).subscribe(
    (response:any)=>{
      this.backupfiles = new Blob([response], {type: 'application/pdf'});

formData.append("name",this.backupfiles,this._assignment.name);
this._matrialservice.post(formData).subscribe(response=>{

  this._matrialservice.delete(this.assignmentid).subscribe(response=>{
  });
  window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment`;


}
)
    });
  }
}
