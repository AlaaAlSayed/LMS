import { StudentHomeComponent } from './../components/student/student-home/student-home.component';
import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterLink, RouterStateSnapshot, UrlTree, CanLoad } from '@angular/router';
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
  constructor(private _router:Router){}
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      if(this.roleId!=3){
        this._router.navigateByUrl('/user/login');
        alert("you are not able to go here, please login as a student first");
        this.isAble= false;
  }
  else if(this.roleId==3){
    this.isAble= true; 
      }
  // if(this.roleId==3 || this.roleId==1){
  //   this._router.navigate([`/student/home/${this.id}`]);
  //   return true;
  // }
  // else{
  //   return false;
  // }
      // this._router.navigateByUrl(`/student/home/${this.id}`);

 
      //navigate to student/home/id with this id

  return this.isAble;
  // return this.roleId==route.data['role_id'];
  } 
}