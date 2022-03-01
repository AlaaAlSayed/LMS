import { Component, OnInit } from '@angular/core';
import { UserService } from 'src/app/services/user.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { HttpHeaders } from '@angular/common/http';
import { Users } from 'src/models/users';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
id:any;
users:any=new Users();
  formLogin=new FormGroup({});
  constructor(private _formBuilder:FormBuilder,private _userService:UserService,private _router:Router) { }

  ngOnInit(): void {
    this.formLogin=this._formBuilder.group({
      username:['' , [Validators.required]],
        // ,Validators.maxLength(15),Validators.minLength(5)]],
      password:['',[Validators.required]]
        // ,Validators.minLength(8),Validators.maxLength(20)]]
    });
  }

  login():void{

    const formData= this.formLogin.getRawValue();
    const data ={
      "username": formData.username,
      "password": formData.password
    }
    
    this._userService.postLogin(data).subscribe((result:any)=>{
      console.log(result);
      const headers=new HttpHeaders({
        Authorization: `Bearer ${result}`
      })
      let options={
        'headers':headers
      }
      localStorage.setItem("token", result);
      this._userService.getLoggedId(options).subscribe((result:any)=> 
        {
          localStorage.setItem("id",result);
          // this._userService.logged.next(true);
          this._userService.getUsers().subscribe(response=>{
            this.users=response;
            if(this.users.roleId==1){
              this._router.navigate(['/admin/home']);
              
            }
             else if(this.users.roleId==2){
              this._router.navigate([`/teacher/home/${this.users.id}`]);
              // this._userService.logged.next(true);
            }
            else if(this.users.roleId==3){
              this._router.navigate([`/student/home/${this.users.id}`]);  
              // this._userService.logged.next(true);            
            }
            
            
            this._userService.logged.next(true);
          })
          // this._userService.logged.next(true);
      },
      error=>{
        console.log(error);
        
      });
      // console.log(this._userService.getLoggedId());
      // this._router.navigateByUrl(`/student/profile/${this._userService.getLoggedId()}`)
    //  alert("you are logged in");
      // this._userService.logged.next(true);
    },
    error=>{
      console.log(error);
      
    }
    )
  }

  isValidControl(name:string):boolean
  {
    return this.formLogin.controls[name].valid;
  }

  isInValidAndTouched(name:string):boolean
  {
    return  this.formLogin.controls[name].invalid && (this.formLogin.controls[name].dirty || this.formLogin.controls[name].touched);
  }

  isControlHasError(name:string,error:string):boolean
  {
    return  this.formLogin.controls[name].invalid && this.formLogin.controls[name].errors?.[error];
  }

}
