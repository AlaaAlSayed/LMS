// import { AdminGuard } from './admin.guard';
import { AdminModule } from './../components/admin/admin.module';
import { UserService } from 'src/app/services/user.service';
import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, CanLoad, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { from, Observable } from 'rxjs';
import { Users } from 'src/models/users';
import { trigger } from '@angular/animations';

@Injectable({
  providedIn: 'root'
})
export class AdminGuard implements CanActivate {
  // users:Users[]=[];
  users:any=new Users();
 isAble:any;
  constructor(private _userService:UserService,private _router:Router){}
  canActivate(route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree
  {
    // return true;
    this._userService.getUsers().subscribe((response:any)=>{
      this.users=response; 
      console.log(response);
    // })
  
    // if(this.users.roleId=2 || (this.users.roleId=3))
    if(this.users.roleId!=1)
    {   
    //  this._router.navigateByUrl('/user/login/');
     this.isAble=false;
     alert("You are not an admin");
     this._router.navigate(['/user/login/']);
    }
  else{   
    this.isAble=true;
  }
})
return this.isAble;
// return true;
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

