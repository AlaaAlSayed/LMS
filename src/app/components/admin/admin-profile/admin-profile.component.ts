import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Admin } from './../../../../models/admin';

@Component({
  selector: 'app-admin-profile',
  templateUrl: './admin-profile.component.html',
  styleUrls: ['./admin-profile.component.css']
})
export class AdminProfileComponent implements OnInit {
  admin:Admin= new Admin();

  constructor(private _adminService:AdminService, 
    private _activatedRoute:ActivatedRoute, private router: Router) { }

  ngOnInit(): void {
    console.log("done");
    this._activatedRoute.paramMap.subscribe( params=>{
      let id = Number(params.get('id'));
      console.log("id",id);

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
  

}
