import { Component, OnInit } from '@angular/core';
import { ClassroomService } from '../../../services/classroom.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-edit-classroom',
  templateUrl: './edit-classroom.component.html',
  styleUrls: ['./edit-classroom.component.css']
})
export class EditClassroomComponent implements OnInit {
id:any;
formEdit = new FormGroup({
  level:new FormControl(),
  code:new FormControl(),
  capacity:new FormControl(),
  // time_table:new FormControl(''),
  })
  constructor(private _formBuilder:FormBuilder,private _classroomService:ClassroomService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {


  this._activatedRoute.paramMap.subscribe( params=>{
    this.id = Number(params.get('id'));
    this._classroomService.getStudentByID(this.id).subscribe(
      response=>{
          this.formEdit=new FormGroup({
            level:new FormControl(response['level']),
            code:new FormControl(response['code']),
            capacity:new FormControl(response['capacity']),
            // time_table:new FormControl(response['time_table']),
          })
        },
      )
})
  }
  updateClass(){
    this._classroomService.updateData(this.id, this.formEdit.value).subscribe(response=>{
      console.log(response, 'updated Successfully');
    }
    )
  }
}
