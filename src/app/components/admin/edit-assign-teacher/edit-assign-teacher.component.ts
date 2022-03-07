import { Component, OnInit } from '@angular/core';
import { TeacherService } from 'src/app/services/teacher.service';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-edit-assign-teacher',
  templateUrl: './edit-assign-teacher.component.html',
  styleUrls: ['./edit-assign-teacher.component.css']
})
export class EditAssignTeacherComponent implements OnInit {
  formEditAssign = new FormGroup({
    // id:new FormControl(''),
    teacherId:new FormControl(),
    subjectId:new FormControl(),
    classroomId:new FormControl(),
  }) 
  id1:any;
  // id_2:any;
  // id_3:any;
  constructor(private _formBuilder:FormBuilder,private _teacherService:TeacherService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe( params=>{
      this.id1 = Number(params.get('id1'));
      // this.id_2 = Number(params.get('id2'));
      // this.id_3=Number(params.get('id3'))
      this._teacherService.getTeaches(this.id1).subscribe(
        response=>{
          this.formEditAssign=new FormGroup({
            // id:new FormControl(response['id']),
            teacherId:new FormControl(response['teacherId']),
            subjectId:new FormControl(response['subjectId']),
            classroomId:new FormControl(response['classroomId']),
          })
          console.log(this.formEditAssign.value);
        }
      )

    })
  }
  updateTeaches(){
    this._teacherService.updateTeaches(this.id1, this.formEditAssign.value).subscribe(
      response=>{
        console.log(response,'updated successfully');
      }
    )
  }

}
