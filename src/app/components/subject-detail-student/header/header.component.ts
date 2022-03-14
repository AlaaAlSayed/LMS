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

  constructor(private _activatedRoute:ActivatedRoute,private _studentService:StudentService) { }
studentid:number=0
  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
       this.studentid=Number(params.get('student_id'));
    })
    this._studentService.getNotification().subscribe(result=>{
      this.notifications=result;
      console.log(result);

    })
  

  }

}
