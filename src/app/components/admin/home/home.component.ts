import { UserService } from 'src/app/services/user.service';
import { SubjectService } from 'src/app/services/subject.service';
import { Subject } from 'src/models/subject';
import { TeacherService } from 'src/app/services/teacher.service';
import { Teacher } from 'src/models/teacher';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { StudentService } from './../../../services/student.service';
import { Component, OnInit } from '@angular/core';
import { Student } from 'src/models/student';
import { ClassroomService } from 'src/app/services/classroom.service';
import { Classroom } from 'src/models/classroom';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
students:Student[]=[];
teachers:Teacher[]=[];
classes:Classroom[]=[];
subjects:Subject[]=[];
  constructor(private _userService:UserService, private _studentService:StudentService,private _subjectService:SubjectService,private _classroomService:ClassroomService,private http:HttpClient, private _teacherService:TeacherService) { }

  ngOnInit(): void {

   this._teacherService.get().subscribe(response=>{
     this.teachers=response;
   })
   this._studentService.get().subscribe(res=>{
     this.students=res;
   })
   this._classroomService.get().subscribe(result=>{
     this.classes=result;
   })
   this._subjectService.get().subscribe(subject=>{
     this.subjects=subject;
   })
  }
  getTeachersCount():number{
    return this.teachers.filter(teacher=>teacher.id).length;
}
getStudentsCount():number{
  return this.students.filter(student=>student.id).length;
}
getClassesCount():number{
  return this.classes.filter(classroom=>classroom.id).length;

}
getSubjectsCount():number{
  return this.subjects.filter(subject=>subject.id).length;

}

}
