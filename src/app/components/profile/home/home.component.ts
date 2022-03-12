import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { annocement } from 'src/app/models/annocement';
import { AnnocementService } from 'src/app/services/annocement.service';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit {


_annocement:annocement[]=[];
_oddannocement:annocement[]=[];
_evenannocement:annocement[]=[];

  constructor(private _annocementservice:AnnocementService) { 
   
  }

  ngOnInit(): void {
    
    this._annocementservice.get().subscribe((response:any)=>{
      this._annocement=response;
      console.log(this._annocement);
    
    

  })

  
  }
}