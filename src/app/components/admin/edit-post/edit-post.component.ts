import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
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
      //this._matrial.name=this.formAdd.value.name;
    this.formAdd=new FormGroup({
      title:new FormControl(this._annocement.title),
      description:new FormControl(this._annocement.description),

      media:new FormControl(),
    
    })
      console.log(this._annocement);
    }) 
  }


  uploadfile(event:any){
    this.files=event.target.files[0];
  }
  uploadfileclick(){
    this.isok=false;
  }
  UpdateAssignment(post:number){
    let formData= new FormData();
    // console.log(this.formAdd.value.name);
     formData.append("id",String(post));
     formData.append("title",this.formAdd.value.title);
     formData.append("description",this.formAdd.value.description);

     this._anncementservice.getfile(this.postid).subscribe(
      (response:any)=>{
        
        this.backupfiles = new Blob([response], {type: 'application/pdf'});
        if(this.files==null){
  formData.append("media",this.backupfiles,this._annocement.file);
  }
  else{
    formData.append("media",this.files,this.files.name);
  
  }
  //this._anncementservice.post(formData).subscribe(response=>{
  
   // this._assignmentservice.delete(this.assignmentid).subscribe(response=>{
    //});
   // window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment`;
  
  
  }
  )
     // });
    }
}
