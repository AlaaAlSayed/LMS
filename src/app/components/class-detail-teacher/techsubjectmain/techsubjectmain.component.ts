import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-techsubjectmain',
  templateUrl: './techsubjectmain.component.html',
  styleUrls: ['./techsubjectmain.component.css']
})
export class TechsubjectmainComponent implements OnInit {
  classroomid:number=0;
  teacherid:number=0;

  constructor(private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.classroomid=Number(params.get('classroomid'));
      this.teacherid=Number(params.get('teacherid'));
    })
  }

}
