import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute,Router } from '@angular/router';
import { annocement } from 'src/app/models/annocement';
import { AnnocementService } from 'src/app/services/annocement.service';

@Component({
  selector: 'app-edit-post',
  templateUrl: './edit-post.component.html',
  styleUrls: ['./edit-post.component.css']
})
export class EditPostComponent implements OnInit {
  adminid:number=0;
  postid:number=0;
  isok:boolean=true;
  backupfiles:any;
  formAdd = new FormGroup({});
  files:any;
  _annocement:annocement=new annocement();
  constructor(private _activatedRoute:ActivatedRoute,private _formBuilder:FormBuilder,private _anncementservice:AnnocementService) { }

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      this.adminid=Number(params.get('adminid'));
      this.postid=Number(params.get('postid'));
    })
    this.formAdd = this._formBuilder.group({
     
      title:[this._annocement.title , [Validators.required]],
      description:[this._annocement.description , [Validators.required]],
      media:['']
  
    })

    this._anncementservice.getbyid(this.postid).subscribe((response:any)=>{
      this._annocement=response;
      console.log( response)
      //this._matrial.name=this.formAdd.value.name;
    this.formAdd=new FormGroup({
      title:new FormControl(this._annocement.title),
      description:new FormControl(this._annocement.description),
      media:new FormControl(),
    
    })
    }) 
  }


  uploadfile(event:any){
    this.files=event.target.files[0];
  }
  uploadfileclick(){
    this.isok=false;
  }
  Updatepost(){
    let formData= new FormData();
    // console.log(this.formAdd.value.name);
     formData.append("adminID",String(this.adminid));
     formData.append("title",this.formAdd.value.title);
     formData.append("description",this.formAdd.value.description);

     this._anncementservice.getfile(this.postid).subscribe(
      (response:any)=>{
        
        if(this.files==null){
          this.backupfiles = new Blob([response],{type:"image/jpg,image/jpeg"});
  formData.append("file",this.backupfiles,this._annocement.media);
  }
  else{
    formData.append("file",this.files,this.files.name);
  console.log(this.files)
  }

/* this._anncementservice.put(this.postid,formData).subscribe( (response:any)=>{
  console.log("done");
}) */


  this._anncementservice.post(formData).subscribe(response=>{
  
   this._anncementservice.delete(this.postid).subscribe(response=>{
     console.log("done");
    });
   // window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment`;
  
  
  
     });

    }
    );
    }
}
