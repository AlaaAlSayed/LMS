import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate,Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { UserService } from 'src/app/services/user.service';
import { Users } from 'src/models/users';

@Injectable({
  providedIn: 'root'
})
export class StudentGuard implements CanActivate {
  users:any=new Users();
  isAble:boolean=false;
  roleId:any=localStorage.getItem('roleId');
  id:any=localStorage.getItem('id');
  constructor(private _userService:UserService,private _router:Router){}
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      if(this.roleId!=3){
        this._router.navigateByUrl('/user/login');
        this.isAble=false;
        alert("you are not able to go here, please login as a student first");
  }
  else{
    this.isAble=true;
  }

//    if(this.roleId==3){
//     this.isAble= true;
//    this._router.parseUrl(`/student/home/${this.id}`);
//  }
//  else if(this.roleId==1)
//   {   
//     this.isAble=false;
//      this._router.parseUrl('/admin/home');
//   }
  
//  else if(this.roleId==2){
//   this.isAble= false;
//    this._router.parseUrl(`/teacher/home/${this.id}`);
//  }
  return this.isAble;
  } 
}