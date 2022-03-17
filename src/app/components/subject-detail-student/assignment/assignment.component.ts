import { Component, enableProdMode, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { subject } from 'src/app/models/subject';
import { DatePipe } from '@angular/common';

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
  _subject:subject=new subject();
  _assignment:AttachedAssignment[]=[];
  _classassignment:assignment[]=[];
  blob:any;
  showid:number=0;
  myDate :any;
  studid:number=0;
  uploaeded:boolean=false;
  dead:boolean=false;
  results:any;
  constructor( private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute,private _assignmentsservice:assignmentsservice,public datepipe: DatePipe) { }
  
  ngOnInit(): void {
    //this.myDate = this.datePipe.transform(this.myDate, 'yyyy-MM-dd');
     this.myDate =this.datepipe.transform((new Date), 'yyyy-MM-dd');
  
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      this.studid=Number(params.get('student_id'));
      this._subjectservice.getSubjectByID(id).subscribe((response:any)=>{
       this._assignment=response.data.StudentsUploads;

       console.log( this._assignment)
      })
      this._assignmentsservice.get(id)
      .subscribe(
        (response:any)=>{
          //this._subject=response.data;
         console.log(response);
         this._classassignment=response;
         
        

         

    
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
  deadlinedisable(assignment:assignment){
    

    var index = this._classassignment.indexOf(assignment); 
    var current = this.myDate.split("-", 3); 
    var deadline = this._classassignment[index].deadline.split("-", 3);
    var not_valid=false; 
    //2022    //2021    
    

if(current[0]>deadline[0]){
this.dead=true;
  not_valid=true; 
}
if(current[1]>deadline[1]){
  this.dead=true;

  not_valid=true; 
}
if(current[2]>deadline[2]){
  this.dead=true;
  not_valid=true; 
}


for (var char of this._assignment) {
  if(this.studid==char.studentId &&
    this._classassignment[index].id==char.assignmentId){
    this.uploaeded=true;
    not_valid=true; 
}
}

console.log( not_valid)

  if( not_valid==true){

   return false;
  }
  else{  return true;
  }

  }

  result(id:number){
    var k=0;
    for (var char of this._assignment) {
      if(this.studid==char.studentId &&id==char.assignmentId){
   this.results=char.result;
  console.log(char)
  console.log(char.assignmentId)

      }
       
    }
    
    
    return this.results
  }
 
}
