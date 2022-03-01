import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router,RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { UserService } from 'src/app/services/user.service';
import { Users } from 'src/models/users';


@Injectable({
  providedIn: 'root'
})
export class TeacherGuard implements CanActivate {
  users:any=new Users();
  isAble:boolean=false;
  constructor(private _userService:UserService,private _router:Router){}
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    // return true;
    this._userService.getUsers().subscribe((response:any)=>{
      this.users=response; 
      
    // })
    // let id= parseInt(`${localStorage.getItem('id')}`);
    // for (let i=0; i<this.users.length;i++){
    if(this.users.roleId!=2){
    //  alert("You are not a teacher");
     this._router.navigate(['/user/login']);
     this.isAble=false;
    // }
  }
  else{this.isAble=true}

  // if(this.users.roleId=2)
  // {this._router.navigateByUrl(`/teacher/home/${id}`);
// return true;
// }
})
  return this.isAble;
  }
  
}
