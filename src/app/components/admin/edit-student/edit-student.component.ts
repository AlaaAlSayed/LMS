import { Student } from './../../../../models/student';
import { Component, OnInit } from '@angular/core';
import { StudentService } from '../../../services/student.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
@Component({
  selector: 'app-edit-student',
  templateUrl: './edit-student.component.html',
  styleUrls: ['./edit-student.component.css']
})
export class EditStudentComponent implements OnInit {

formEdit = new FormGroup({
  name:new FormControl(''),
  email:new FormControl(''),
  phone:new FormControl(''),
  classroomId:new FormControl(),
  picture_path:new FormControl(),
  government:new FormControl(''),
  city:new FormControl(''),
  street:new FormControl(''),
}) 
id:any
files:any;
  data:any;
  student=new Student;
  constructor(private _formBuilder:FormBuilder,private _studentService:StudentService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      this.id = Number(params.get('id'));
      this._studentService.getStudentByID(this.id).subscribe(
        response=>{
          // console.log(response.picture_path);
          // console.log(response);
          this.formEdit=new FormGroup({
            name:new FormControl(response['name']),
            email:new FormControl(response['email']),
            phone:new FormControl(response['phone']),
            classroomId:new FormControl(response['classroomId']),
            // picture_path:new FormControl(response['picture_path']),
            government:new FormControl(response['government']),
            city:new FormControl(response['city']),
            street:new FormControl(response['street']),
          })
        },
      )
      // this.formAdd = this._formBuilder.group({
      //   name:[this.student.name, [Validators.maxLength(30),Validators.minLength(3)]],
      //   email:[this.student.email , [Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]],
      //   // studentPassword:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
      //   phone:[this.student.phone,[Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]],
      //   // studentLevel:['',[Validators.required]],
      //   classroomId:[this.student.classroomId],
      //   picture_path:[this.student.picture_path],
      //   government:[this.student.government,[Validators.minLength(4),Validators.maxLength(10)]],
      //   city:[this.student.city,[Validators.minLength(4),Validators.maxLength(10)]],
      //   street:[this.student.street,[Validators.minLength(2),Validators.maxLength(30)]]
      })
    
    
  }
  // isValidControl(name:string):boolean
  // {
  //   return this.formEdit.controls[name].valid;
  // }
  // isInValidAndTouched(name:string):boolean
  // {
  //   return  this.formEdit.controls[name].invalid && (this.formEdit.controls[name].dirty || this.formEdit.controls[name].touched);
  // }
  // isControlHasError(name:string,error:string):boolean
  // {
  //   return  this.formEdit.controls[name].invalid && this.formEdit.controls[name].errors?.[error];
  // }
  uploadImage(event:any){
   this.files=event.target.files[0];
  }
  updateStudent(){
    this._studentService.updateData(this.id, this.formEdit.value).subscribe(response=>{
      console.log(response, 'updated Successfully');
    }
    )
  }
}
