import { UserService } from 'src/app/services/user.service';
import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Admin } from './../../../../models/admin';
import { Users } from 'src/models/users';

@Component({
  selector: 'app-admin-profile',
  templateUrl: './admin-profile.component.html',
  styleUrls: ['./admin-profile.component.css']
})
export class AdminProfileComponent implements OnInit {
  admin:any= new Admin();
  user:any=new Users();
  // id=`${localStorage.getItem('id')}`;
  // id:any=localStorage.getItem('id');
  constructor(private _adminService:AdminService, 
    private _activatedRoute:ActivatedRoute, private router: Router, private _userService:UserService) { }

  ngOnInit(): void {
    // console.log("done");
    // this._activatedRoute.paramMap.subscribe( params=>{
    //   let id = Number(params.get('id'));
    //   console.log("id",id);
     this._userService.getUsers().subscribe(result=>{
       this.user=result;
    //    console.log(this.user);
    
      this._adminService.getAdmin(this.user.id)
      .subscribe(
        response=>{
          this.admin=response;
          console.log(this.admin);
        },
      )
     })
    //  this._adminService.getAdmin(this.user.username, this.user.id)
    //   .subscribe(
    //     response=>{
    //       this.admin=response;
    //       console.log(this.admin);
    //     },
    //   )
     
      
    // }
    // )
  }
  

}
