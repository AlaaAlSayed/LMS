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
            name:new FormControl(response['name']),
            email:new FormControl(response['email']),
            phone:new FormControl(response['phone']),
            government:new FormControl(response['government']),
            city:new FormControl(response['city']),
            street:new FormControl(response['street']),
            // picture_path:new FormControl(response['picture_path']),
          })
        },
      )
    })
     
  }
  uploadImage(event:any){
    this.files=event.target.files[0];
   }
   updateTeacher(){
     this._teacherService.updateData(this.id, this.formEdit.value).subscribe(response=>{
       console.log(response, 'updated Successfully');
     }
     )
   }

  }

