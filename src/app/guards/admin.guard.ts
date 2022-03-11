// import { AdminGuard } from './admin.guard';
import { AdminModule } from './../components/admin/admin.module';
import { UserService } from 'src/app/services/user.service';
import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, CanLoad, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { from, Observable } from 'rxjs';
import { Users } from 'src/models/users';
import { trigger } from '@angular/animations';
import { Location } from '@angular/common';
@Injectable({
  providedIn: 'root'
})
export class AdminGuard implements CanActivate {
  // users:Users[]=[];
  users:any=new Users();
 isAble:boolean=false;
  // roleId=`${localStorage.getItem('roleId')}`;
  roleId:any=localStorage.getItem('roleId');
  id:any=localStorage.getItem('id');
  constructor(private _userService:UserService,private _router:Router, private location:Location){}
  canActivate(route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree
  { 

      if(this.roleId!=1){
        this._router.navigateByUrl('/user/login');
        
        this.isAble=false;
        alert("you are not an admin");
  }
  else{
    this.isAble=true;
  }
  // route.data['role'].forEach(
  //   (element:any) => {
  //   if(element==this.roleId) { 
  //     this.isAble=true 
  //   } 
  //  else{ this.isAble=false; 
  // alert('not allowed')}
    
  // });
  return this.isAble;

  // return route.data['role']==this.roleId;

    //   if(this.roleId==1)
    //   {   
    //     this.isAble=true;
    //     this.location.replaceState('/admin/home');
    //   }
    //   else if(this.roleId==3){
    //     this.location.replaceState(`/student/home/${this.id}`);
    //     this.isAble= false;
    //     alert("You are not an admin");
        
    //  }
    //  else if(this.roleId==2){
    //   this.isAble= false;
    //   this.location.replaceState(`/teacher/home/${this.id}`);
    //  }
    //  alert("You are not an admin");
    // }
    // return this._router.parseUrl('/admin/home');
  // console.log(ActivatedRouteSnapshot);
  // console.log(RouterStateSnapshot);
// return this.isAble;
}
}

