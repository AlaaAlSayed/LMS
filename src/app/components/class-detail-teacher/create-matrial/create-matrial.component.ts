import { MatrialService } from './../../../services/matrial.service';
import { matrial } from 'src/app/models/matrial';
import { Component, OnInit } from '@angular/core';
import { subject } from 'src/app/models/subject';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubjectService } from 'src/app/services/subject.service';

@Component({
  selector: 'app-create-matrial',
  templateUrl: './create-matrial.component.html',
  styleUrls: ['./create-matrial.component.css']
})
export class CreateMatrialComponent implements OnInit {
  matrials:matrial[]=[];

  constructor(private _matrialservice:MatrialService ) { }

  ngOnInit(): void {
  }
  add(file:FormData,_name:string):void{
    let _matrial=new matrial();
    _matrial.name=_name;
    _matrial.input_file=file;
    this._matrialservice.post(_matrial)
    .subscribe(
      (response:any)=>{
        this.matrials.push(_matrial);
      },
      (error:any)=>{}
    );
    
  }

}
