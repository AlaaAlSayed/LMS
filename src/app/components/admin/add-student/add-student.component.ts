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
  // student: Student = {} as Student;
  
  student=new Student();
    formAdd = new FormGroup({}) 
  constructor(private _formBuilder:FormBuilder, private _studentService:StudentService) { }
//private _formBuilder:FormBuilder
  ngOnInit(): void {
    this.formAdd = this._formBuilder.group({
      id:[''],

      name:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
      email:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]],
      // studentPassword:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
      phone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]],
      // studentLevel:['',[Validators.required]],
      classroomId:['',[Validators.required]],
      picture_path:['',[Validators.required]],
      government:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      city:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      street:['',[Validators.required,Validators.minLength(2),Validators.maxLength(30)]]
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
  console.log(this.student);
// })
 })
}
// console.log('hello');
//  }

}
