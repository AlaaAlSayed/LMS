import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute } from '@angular/router';
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

  admin:any= new Admin();
  constructor(private _adminService:AdminService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
      this._activatedRoute.paramMap.subscribe( params=>{
        let id = Number(params.get('id'));
        this._adminService.getAdminByID(id)
        .subscribe(
          response=>{
            this.admin=response;
            console.log(response);
          },
        )
      }
      )
  }
  
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
