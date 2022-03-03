import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { AnnocementService } from 'src/app/services/annocement.service';

@Component({
  selector: 'app-add-post',
  templateUrl: './add-post.component.html',
  styleUrls: ['./add-post.component.css']
})
export class AddPostComponent implements OnInit {
  adminid:number=0;
  formAdd = new FormGroup({});
  files:any;

  constructor(private _activatedRoute:ActivatedRoute,private _annocementservice:AnnocementService ,private _formBuilder:FormBuilder) { }

  ngOnInit(): void {

    this._activatedRoute.paramMap.subscribe(params=>{
      this.adminid=Number(params.get('adminid'));
      console.log(this.adminid);
    })
    this.formAdd = this._formBuilder.group({
      title:['' ],
      description:[''],
      media:[''  ]
    
    }) 

    
  }
  uploadfile(event:any){
    this.files=event.target.files[0];

  }
  insertpost(){
    let formData= new FormData();
   formData.append("title",this.formAdd.value.title);
   console.log(formData.get("title"));

   formData.append("media",this.files, this.files.name);
   console.log(formData.get("media"));

   formData.append("description",this.formAdd.value.description);
   console.log(formData.get("description"));
   
   formData.append("adminID",String(this.adminid));
   console.log(formData.get("adminID"));

   this._annocementservice.post(formData).subscribe(response=>{
    this.files=response;
    //console.log(this.files);
    //window.location.href=`http://localhost:4200/classroom/${this.teacherid}/${this.classroomid}/assignment`;

  
  },
  //(error:any)=>{alert("error in post");}
  )}
}
