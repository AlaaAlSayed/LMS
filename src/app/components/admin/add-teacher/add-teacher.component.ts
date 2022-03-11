import { Component, OnInit } from '@angular/core';
import { TeacherService } from 'src/app/services/teacher.service';
import { FormBuilder, FormGroup,FormControl, Validators } from '@angular/forms';
import { TeacherTeachesSubjects } from 'src/models/teacher_teaches_subjects';
@Component({
  selector: 'app-add-teacher',
  templateUrl: './add-teacher.component.html',
  styleUrls: ['./add-teacher.component.css']
})
export class AddTeacherComponent implements OnInit {
  files:any;
  data:any;
    formAdd = new FormGroup({}) 

    //assign teacher to subject and class
    id:any;
    formAssign = new FormGroup({}) 
    teaches:TeacherTeachesSubjects[]=[]
  constructor(private _formBuilder:FormBuilder, private _teacherService:TeacherService) { }

  ngOnInit(): void {
    this.formAdd = this._formBuilder.group({
      id:[''],

      name:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(3)]],
      username:['' , [Validators.required,Validators.maxLength(15),Validators.minLength(4)]],
      email:['' , [Validators.required,Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]],
      password:['',[Validators.required,Validators.minLength(4),Validators.maxLength(20)]],
      phone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]],
      government:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      city:['',[Validators.required,Validators.minLength(4),Validators.maxLength(10)]],
      street:['',[Validators.required,Validators.minLength(2),Validators.maxLength(30)]],
      picture_path:['',[Validators.required]],
     
    })
    this._teacherService.getClasses(this.id).subscribe (
      teach=>{this.teaches=teach;
      }
      )
      this.formAssign = this._formBuilder.group({
        id:[''],
        teacherId:[''],
        subjectId:[''],
        classroomId:[''],  
      })
  }
  AssignTeacher(teacherId:number, subjectId:number, classroomId:number){
    let teach= new TeacherTeachesSubjects();
    teach.teacherId=teacherId;
    teach.subjectId=subjectId;
    teach.classroomId= classroomId;
    this._teacherService.postTeacherClass(teach).subscribe(response=>{
      console.log(this.teaches);
      this.teaches.push(teach);
      alert('Added Successfully');
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
   formData.append("username",this.formAdd.value.username);
   formData.append("password",this.formAdd.value.password);
   formData.append("phone",this.formAdd.value.phone);
   formData.append("classroomId",this.formAdd.value.classroomId);
   formData.append("picture_path",this.files, this.files.name);
   formData.append("government",this.formAdd.value.government);
   formData.append("city",this.formAdd.value.city);
   formData.append("street",this.formAdd.value.street);

this._teacherService.post(formData).subscribe(response=>{
  this.files=response;
  console.log(this.files);
  alert('Added Successfully');

})
}

}
