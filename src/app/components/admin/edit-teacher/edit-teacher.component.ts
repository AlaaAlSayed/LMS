import { Component, OnInit } from '@angular/core';
import { TeacherService } from 'src/app/services/teacher.service';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-edit-teacher',
  templateUrl: './edit-teacher.component.html',
  styleUrls: ['./edit-teacher.component.css']
})
export class EditTeacherComponent implements OnInit {


formEdit = new FormGroup({
  name:new FormControl(''),
  email:new FormControl(''),
  phone:new FormControl(''),
  government:new FormControl(''),
  city:new FormControl(''),
  street:new FormControl(''),
  picture_path:new FormControl(),
}) 
// formAssign = new FormGroup({
//   teacherId:new FormControl(),
//   subjectId:new FormControl(),
//   classroomId:new FormControl(),
// }) 
// id1:any;
// id2:any;
id:any
files:any;
  data:any;
  constructor(private _formBuilder:FormBuilder,private _teacherService:TeacherService, private _activatedRoute:ActivatedRoute) { }


  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      this.id = Number(params.get('id'));
      this._teacherService.getTeacherByID(this.id).subscribe(
        response=>{
          this.formEdit=new FormGroup({
            name:new FormControl(response['name'],[Validators.required,Validators.minLength(3)]),
            email:new FormControl(response['email'],[Validators.required,Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]),
            phone:new FormControl(response['phone'],[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]),
            government:new FormControl(response['government'],[Validators.required,Validators.minLength(4),Validators.maxLength(10)]),
            city:new FormControl(response['city'],[Validators.required,Validators.minLength(4),Validators.maxLength(10)]),
            street:new FormControl(response['street'],[Validators.required,Validators.minLength(2),Validators.maxLength(30)]),
            // picture_path:new FormControl(response['picture_path']),
          })
        },
      )
    })

    // this._activatedRoute.paramMap.subscribe( params=>{
    //   this.id1 = Number(params.get('id'));
    //   this.id2 = Number(params.get('id'));
    //   this._teacherService.getTeaches(this.id1,this.id2).subscribe(
    //     res=>{
    //       this.formAssign=new FormGroup({
    //         teacherId:new FormControl(res['teacherId']),
    //         subjectId:new FormControl(res['subjectId']),
    //         classroomId:new FormControl(res['classroomId']),
    //       })
    //     }
    //   )

    // }

    // )
     
  }
  // updateTeaches(){
  //   this._teacherService.updateTeaches(this.id1,this.id2, this.formAssign.value).subscribe(
  //     response=>{
  //       console.log(response,'updated successfully')
  //     }
  //   )
  // }
  uploadImage(event:any){
    this.files=event.target.files[0];
   }
   updateTeacher(){
     this._teacherService.updateData(this.id, this.formEdit.value).subscribe(response=>{
       console.log(response, 'updated Successfully');
     }
     )
   }
   isValidControl(name:string):boolean
   {
     return this.formEdit.controls[name].valid;
   }
   isInValidAndTouched(name:string):boolean
   {
     return  this.formEdit.controls[name].invalid && (this.formEdit.controls[name].dirty || this.formEdit.controls[name].touched);
   }
   isControlHasError(name:string,error:string):boolean
   {
     return  this.formEdit.controls[name].invalid && this.formEdit.controls[name].errors?.[error];
   }
  }

