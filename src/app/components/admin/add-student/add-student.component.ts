import { StudentService } from './../../../services/student.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Student } from 'src/models/student';

@Component({
  selector: 'app-add-student',
  templateUrl: './add-student.component.html',
  styleUrls: ['./add-student.component.css']
})
export class AddStudentComponent implements OnInit {
  // student:Student= new Student();
  student: Student = {} as Student;
    formAdd = new FormGroup({}) 
  constructor(private _formBuilder:FormBuilder, private _studentService:StudentService) { }
//private _formBuilder:FormBuilder
  ngOnInit(): void {
    this.formAdd = this._formBuilder.group({
      studentName:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
      studentEmail:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(10)]],
      studentPassword:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
      studentPhone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11)]],
      studentLevel:['',[Validators.required]],
      studentClass:['',[Validators.required]],
      studentPicture:['',[Validators.required]],
      studentGov:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      studentCity:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      studentStreet:['',[Validators.required,Validators.minLength(2),Validators.maxLength(30)]]
    })
  }
  Add():void
  {
    alert(JSON.stringify(this.formAdd.value));
  }
  isValidControl(name:string):boolean
  {
    return this.formAdd.controls[name].valid;
  }
  isInValidAndTouched(name:string):boolean
  {
    return  this.formAdd.controls[name].invalid && (this.formAdd.controls[name].dirty || this.formAdd.controls[name].touched);
  }
  isControlHasError(name:string,error:string):boolean
  {
    return  this.formAdd.controls[name].invalid && this.formAdd.controls[name].errors?.[error];
  }
 insertStudent(){
this._studentService.post(this.student).subscribe(response=>{
  console.log(response);
})
 }

}
