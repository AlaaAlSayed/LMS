import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { UserService } from 'src/app/services/user.service';
import { Users } from 'src/models/users';

@Component({
  selector: 'app-edit-admin',
  templateUrl: './edit-admin.component.html',
  styleUrls: ['./edit-admin.component.css']
})
export class EditAdminComponent implements OnInit {
  formEdit = new FormGroup({
    name:new FormControl(''),
    email:new FormControl(''),
    username:new FormControl(''),
    password:new FormControl(''),
    phone:new FormControl(''),
    government:new FormControl(''),
    city:new FormControl(''),
    street:new FormControl(''),
  }) 
  // id:any;
  user:any=new Users();
  constructor(private _formBuilder:FormBuilder, private _userService:UserService,private _adminService:AdminService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    // this._activatedRoute.paramMap.subscribe( params=>{
    //   this.id = Number(params.get('id'));
    this._userService.getUsers().subscribe(result=>{
      this.user=result;
      this._adminService.getAdmin(this.user.id).subscribe(
        response=>{
          this.formEdit=new FormGroup({
            name:new FormControl(response['name'],[Validators.required,Validators.minLength(3)]),
            email:new FormControl(response['email'],[Validators.required,Validators.maxLength(30),Validators.minLength(10), Validators.pattern(/^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,3}$/)]),
            username:new FormControl(response['username'],[Validators.required,Validators.minLength(5),Validators.maxLength(15)]),
            password:new FormControl(response['password'],[Validators.required,Validators.minLength(8),Validators.maxLength(20)]),
            phone:new FormControl(response['phone'],[Validators.required,Validators.minLength(11),Validators.maxLength(11), Validators.pattern(/^01[0,1,2,5]\d{1,8}$/)]),
            government:new FormControl(response['government'],[Validators.required,Validators.minLength(4),Validators.maxLength(10)]),
            city:new FormControl(response['city'],[Validators.required,Validators.minLength(4),Validators.maxLength(10)]),
            street:new FormControl(response['street'],[Validators.required,Validators.minLength(2),Validators.maxLength(30)]),
          })
        },
      )
    })
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
  updateAdmin(){
    this._adminService.updateData(this.user.id, this.formEdit.value).subscribe(response=>{
      console.log(response, 'updated Successfully');
    }
    )
  }

}
