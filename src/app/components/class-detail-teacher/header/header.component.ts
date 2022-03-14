import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { StudentService } from 'src/app/services/student.service';
import { Notifications } from 'src/models/notifications';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  notifications:Notifications[]=[];
  classroomid:number=0;
  teacherid:number=0;
  constructor(private _activatedRoute:ActivatedRoute,private _studentService:StudentService) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })
    this._studentService.getNotification().subscribe(result=>{
      this.notifications=result;
      console.log(result);

    })
  }

}
