import { Component, enableProdMode, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { subject } from 'src/app/models/subject';
import { SubjectService } from 'src/app/services/subject.service';
import { AttachedAssignment } from 'src/app/models/AttachedAssignment';
import { assignment } from 'src/app/models/assignment';
import { assignmentsservice } from 'src/app/services/assignments.service';
//import { DatePipe } from '@angular/common';

enableProdMode();
@Component({
  selector: 'app-assignment',
  templateUrl: './assignment.component.html',
  styleUrls: ['./assignment.component.css']
})
export class AssignmentComponent implements OnInit {

  constructor( private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute,private _assignmentsservice:assignmentsservice) { }
  _subject:subject=new subject();
  _assignment:AttachedAssignment[]=[];
  _classassignment:assignment[]=[];
  blob:any;
  showid:number=0;
  myDate = new Date();
  isok:boolean=true;

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice. getSubjectByID(id)
      .subscribe(
        (response:any)=>{
          this._subject=response.data;
         // console.log(response.data);
        
      this._classassignment=this._subject.assignments;
      console.log(this._classassignment);

    
        },
        (error:any)=>{alert("error");}
      )
      /* this._assignmentsservice.getuploads().subscribe((response:any)=>{
        this._assignment=response;
        console.log(response);
      }) */
            
          })
   

  }
  redirect(id:number){

    this._assignmentsservice.show(id).subscribe(
    
      (response:any)=>{
    
    window.open (response,'_blank') ;
    
      },
      (error:any)=>{alert("error");}
    )
    
      }
      downloadid(id:number,name:string){
        console.log(id);
    
    this._assignmentsservice.download(id).subscribe(
    
      (response:any)=>{
        this.blob = new Blob([response], {type: 'application/pdf'});
    
        var downloadURL = window.URL.createObjectURL(response);
        var link = document.createElement('a');
        link.href = downloadURL;
        //let str=name.concat(".pdf");
        link.download = name;
        link.click();
      }
    )
}
  deadlinedisable(assignmentid:number){
   

    this._assignmentsservice.getById(assignmentid).subscribe(
      (response:any)=>{

        //this.myDate=response.deadline;
        console.log(this.myDate);
        //this.myDate = this.datePipe.transform(response.deadline, 'yyyy-MM-dd');
      }
    )
  }

}
