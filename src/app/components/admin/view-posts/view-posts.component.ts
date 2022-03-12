import { Component, OnInit } from '@angular/core';
import { ActivatedRoute,Router } from '@angular/router';
import { annocement } from 'src/app/models/annocement';
import { AnnocementService } from 'src/app/services/annocement.service';
import { EditPostComponent } from '../edit-post/edit-post.component';
@Component({
  selector: 'app-view-posts',
  templateUrl: './view-posts.component.html',
  styleUrls: ['./view-posts.component.css']
})
export class ViewPostsComponent implements OnInit {
  p: number = 1;
  count: number = 5;
  constructor( private _annocementservice:AnnocementService,private _activatedRoute:ActivatedRoute) { }
  
  _annocement:annocement[]=[];
adminid:number=0;
postid:number=0;

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
    this.adminid=Number(params.get('adminid'));
    });
    this._annocementservice.get().subscribe(
      (response:any)=>
      
      {
        this._annocement=response;
      })
  }
delete(id:number,current:number){
  this._annocementservice.delete(id).subscribe(
    (response:any)=>{
      this._annocement.splice(current,1);
    },
  )
}
}
