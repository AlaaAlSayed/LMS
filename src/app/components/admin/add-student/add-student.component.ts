import { StudentService } from './../../../services/student.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-add-student',
  templateUrl: './add-student.component.html',
  styleUrls: ['./add-student.component.css']
})
export class AddStudentComponent implements OnInit {
  // student: Student = {} as Student;
  files:any;
  data:any;
    formAdd = new FormGroup({}) 
  constructor(private _formBuilder:FormBuilder, private _studentService:StudentService) { }
//private _formBuilder:FormBuilder
  ngOnInit(): void {
    this.formAdd = this._formBuilder.group({
      id:[''],

      name:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
      username:['' , [Validators.required,Validators.maxLength(15),Validators.minLength(5)]],
      password:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
      phone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]],
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
  uploadImage(event:any){
   this.files=event.target.files[0];
  }
 insertStudent(){
   let formData= new FormData();
   formData.append("name",this.formAdd.value.name);
   formData.append("username",this.formAdd.value.username);
   formData.append("password",this.formAdd.value.password);
   formData.append("phone",this.formAdd.value.phone);
   formData.append("classroomId",this.formAdd.value.classroomId);
   formData.append("picture_path",this.files, this.files.name);
   formData.append("government",this.formAdd.value.government);
   formData.append("city",this.formAdd.value.city);
   formData.append("street",this.formAdd.value.street);

this._studentService.post(formData).subscribe((response:any)=>{
  this.files=response.data;
  console.log(this.files);
  alert('Added Successfully');

})
}


}
