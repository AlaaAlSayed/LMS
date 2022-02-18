import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-admin-dashboard',
  templateUrl: './admin-dashboard.component.html',
  styleUrls: ['./admin-dashboard.component.css']
})
export class AdminDashboardComponent implements OnInit {
  isDisplay=true;
  isDisplay2=true;
  constructor() { }

  ngOnInit(): void {
  }
  toggleDisplay(){
    this.isDisplay=!this.isDisplay;
  }
  toggleDisplay2(){
    this.isDisplay2=!this.isDisplay2;
  }

}
