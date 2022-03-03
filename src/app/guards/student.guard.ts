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
  constructor(private _userService:UserService,private _router:Router){}
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    // return true;
    this._userService.getUsers().subscribe((response:any)=>{
      this.users=response; 

      if(this.users.roleId!=3){
        this._router.navigateByUrl('/user/login');
        this.isAble=false;
        alert("you are not able to go here, please login as a student first");
  }
  else{
    this.isAble=true;
  }

})
  return this.isAble;
  }
  
}
// if(this.users.roleId!=3 && this.users.roleId==1){
      // this._router.navigate(['/admin/home']);
      // if(this.users.roleId==1){this._router.navigate(['/admin/home']); this.isAble=true; }
    //  else{
     
    //  }
    // }
// else if(this.users.roleId=3)
  // {this._router.navigateByUrl(`/student/home/${id}`);
// return true;
// }
    // alert("you are student");
    // this._router.navigate([`/student/home/${this.users.id}`]);
        // let id= parseInt(`${localStorage.getItem('id')}`);
