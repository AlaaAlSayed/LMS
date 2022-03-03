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
  
    if(this.users.roleId!=2){
     this._router.navigateByUrl('/user/login');
     this.isAble=false;
     alert("you are not able to go here,Please Login as teacher first")
  }
 
  else {
    this.isAble=true}
})
  return this.isAble;
  }
  
}
    // this._router.navigateByUrl(`/teacher/home/${this.users.id}`);
 // if (this.users.roleId==1 || this.users.roleId==3){
  //   this._router.navigate(['/user/login']);
  //    this.isAble=false;
  // }
