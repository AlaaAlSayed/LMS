import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { annocement } from 'src/app/models/annocement';
import { AnnocementService } from 'src/app/services/annocement.service';

@Component({
  selector: 'app-detail-post',
  templateUrl: './detail-post.component.html',
  styleUrls: ['./detail-post.component.css']
})
export class DetailPostComponent implements OnInit {
postid:number=0;
adminid:number=0;
_annocement:annocement=new annocement();
path:any;
  constructor(private _activatedRoute:ActivatedRoute,private _annocementservice:AnnocementService) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.adminid=Number(params.get('adminid'));
      this.postid=Number(params.get('postid'));
    });
    this._annocementservice.getbyid(this.postid).subscribe((response:any)=>{
      this._annocement=response;
      console.log(this._annocement);
    })
    this._annocementservice.getbyidpic(this.postid).subscribe((response:any)=>{
      this.path=response;
      console.log(this.path);

    })
  }

}
