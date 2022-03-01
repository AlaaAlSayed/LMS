import { UserService } from 'src/app/services/user.service';
import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Admin } from '../../../../models/admin';

@Component({
  selector: 'app-admin-dashboard',
  templateUrl: './admin-dashboard.component.html',
  styleUrls: ['./admin-dashboard.component.css']
})
export class AdminDashboardComponent implements OnInit {
  isDisplay=true;
  isDisplay2=true;
  isDisplay3=true;
  isDisplay4=true;
  isLogged=false;
  admin:Admin= new Admin();
  constructor(private _adminService:AdminService, 
    private _activatedRoute:ActivatedRoute, private router:Router,
    private _userService:UserService) { }

  ngOnInit(): void {
    // this._userService.logged.subscribe(status=>{
    //   this.isLogged=status;
    // })
    //comment to be retrieved
      // let id=this._activatedRoute.snapshot.paramMap.get('id')

        // let id = Number(params.get('id'));
        // console.log('done', id);

        // console.log(id);
        // this._adminService.getAdminByID(Number(id))
        // .subscribe(
        //   response=>{
        //     this.admin=response;
        //     console.log(response);
            // this.router.navigate(["admin/admin-profile", id]);
        //   },
        // )
        // let id= parseInt(`${localStorage.getItem('id')}`);

        this._activatedRoute.paramMap.subscribe( params=>{
          let id = Number(params.get('id'));
          this._adminService.getAdminByID(id)
          .subscribe(
            response=>{
              this.admin=response;
            },
          )
        }
        )
      }
      // )
      // let currentID = this._activatedRoute.snapshot.paramMap.get('id');
      // console.log(currentID);
  // }
  // clickHandler(id: any) {
    
  //   console.log('click handler', id);
  //   this.router.navigate(["admin/admin-profile", id]);
  // }
  
  toggleDisplay(){
    this.isDisplay=!this.isDisplay;
  }
  toggleDisplay2(){
    this.isDisplay2=!this.isDisplay2;
  }
  toggleDisplay3(){
    this.isDisplay3=!this.isDisplay3;
  }
  toggleDisplay4(){
    this.isDisplay4=!this.isDisplay4;
  }

}
