import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { assignment } from 'src/app/models/assignment';
import { AttachedAssignment } from 'src/app/models/AttachedAssignment';
import { subject } from 'src/app/models/subject';
import { assignmentsservice } from 'src/app/services/assignments.service';
import { MatrialService } from 'src/app/services/matrial.service';
import { StudentService } from 'src/app/services/student.service';
import { SubjectService } from 'src/app/services/subject.service';
import { Student } from 'src/models/student';

@Component({
  selector: 'app-stuedentuploas',
  templateUrl: './stuedentuploas.component.html',
  styleUrls: ['./stuedentuploas.component.css']
})
export class StuedentuploasComponent implements OnInit {

  constructor(private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute,private _assignmentsservice:assignmentsservice,private _matrialservice:MatrialService,private _studentService:StudentService) { }
  classroomid:number=0;
  teacherid:number=0;
  _assignments:AttachedAssignment[]=[];
  assignments:assignment[]=[];
  names:any[]=[];

  _subject:subject=new subject();
  myStudent:any= new Student();


  subjectid:number=0;
  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })

    this._matrialservice.getSubjectById(this.teacherid,this.classroomid).subscribe(
      (response:any)=>{
      
      this.assignments=response;
      this.subjectid=this.assignments[0].subjectId;

      this._subjectservice.getSubjectByID(this.subjectid)
      .subscribe(
        (response:any)=>{
         // console.log(this.subjectid);

          this._subject=response.data;
        
      this._assignments=this._subject.StudentsUploads;
      //console.log(this._assignments);


     /*  for (var char of this._assignments) {
        var stud=char.studentId;
        this._studentService.getStudentByID(stud)
        .subscribe(
          response=>{
            this.myStudent=response;
            this.names.push(this.myStudent)
            console.log( this.names)
          },
        )
      } */
        })
      })
  
  }

}
