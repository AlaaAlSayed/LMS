import { UserService } from 'src/app/services/user.service';
import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { Users } from 'src/models/users';
import { trigger } from '@angular/animations';
import { AuthGuard } from './auth.guard';

@Injectable({
  providedIn: 'root'
})
export class AdminGuard implements CanActivate {
  // users:Users[]=[];
  users:any=new Users();
 isAble:boolean=false;
  constructor(private _userService:UserService,private _router:Router){}
  canActivate(){
    // return true;
    this._userService.getUsers().subscribe((response:any)=>{
      this.users=response; 
      console.log(response);
    // })
    // let id= parseInt(`${localStorage.getItem('id')}`);
    // if(this.users.roleId!=1 &&(this.users.roleId=2) )
    if(this.users.roleId!=1)
    {
    //  alert("You are not an admin");
    if(this.users.roleId==3){    
     this._router.navigate([`/student/home/${this.users.id}`]);
     this.isAble=true;}
     alert("You are not an admin");
    // this._router.navigate(['/admin/home']);
    // this.isAble=false
    //  return false;
  }
  else{this.isAble=true;}
})
return this.isAble;
// else if(this.users.roleId==2){this._router.navigate([`/teacher/home/${this.users.id}`]);
// this.isAble=true;
// }
// else if(this.users.roleId==3){this._router.navigate([`/student/home/${this.users.id}`]);
// this.isAble=true;
// }
 
  // if(this.users.roleId=1)
  // return true;
  // return true;
  // {this._router.navigateByUrl('/admin/home');}
  // return false;

  // return true;
  // if(this.users.roleId=1)
  
  
}
}

