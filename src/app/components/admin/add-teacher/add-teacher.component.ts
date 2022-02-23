import { Component, OnInit } from '@angular/core';
import { TeacherService } from 'src/app/services/teacher.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
@Component({
  selector: 'app-add-teacher',
  templateUrl: './add-teacher.component.html',
  styleUrls: ['./add-teacher.component.css']
})
export class AddTeacherComponent implements OnInit {
  files:any;
  data:any;
    formAdd = new FormGroup({}) 
  constructor(private _formBuilder:FormBuilder, private _teacherService:TeacherService) { }

  ngOnInit(): void {
    this.formAdd = this._formBuilder.group({
      id:[''],

      name:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
      email:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]],
      // studentPassword:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
      phone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]],
      government:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      city:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      street:['',[Validators.required,Validators.minLength(2),Validators.maxLength(30)]],
      picture_path:['',[Validators.required]],
     
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
   formData.append("email",this.formAdd.value.email);
   formData.append("phone",this.formAdd.value.phone);
   formData.append("classroomId",this.formAdd.value.classroomId);
   formData.append("picture_path",this.files, this.files.name);
   formData.append("government",this.formAdd.value.government);
   formData.append("city",this.formAdd.value.city);
   formData.append("street",this.formAdd.value.street);

this._teacherService.post(formData).subscribe(response=>{
  this.files=response;
  console.log(this.files);

})
}

}
