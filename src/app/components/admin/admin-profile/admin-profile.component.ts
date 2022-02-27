import { Component, OnInit } from '@angular/core';
import { AdminService } from '../../../services/admin.service';
import { ActivatedRoute } from '@angular/router';
import { Admin } from './../../../../models/admin';

@Component({
  selector: 'app-admin-profile',
  templateUrl: './admin-profile.component.html',
  styleUrls: ['./admin-profile.component.css']
})
export class AdminProfileComponent implements OnInit {
  admin:any= new Admin();

  constructor(private _adminService:AdminService, private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
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

}
