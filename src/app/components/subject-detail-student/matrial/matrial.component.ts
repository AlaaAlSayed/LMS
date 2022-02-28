
import { subject } from 'src/app/models/subject';
import { Component, OnInit ,Injectable} from '@angular/core';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { SubjectService } from 'src/app/services/subject.service';
import { matrial } from 'src/app/models/matrial';
import { MatrialService } from 'src/app/services/matrial.service';

@Component({
  selector: 'app-matrial',
  templateUrl: './matrial.component.html',
  styleUrls: ['./matrial.component.css']
})
export class MatrialComponent implements OnInit {

  constructor( private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute,private _matrialservice:MatrialService) { }
  _subject:subject=new subject();
  _matrial:matrial[]=[];
 // link:any;
  showid:number=1;
  blob:any;

  ngOnInit(): void {
    this._activatedRoute.paramMap.subscribe(params=>{
      let id=Number(params.get('id'));
      let student_id=Number(params.get('student_id'));
      
      this._subjectservice. getSubjectByID(id)
      .subscribe(
        (response:any)=>{
          this._subject=response.data;
        
      this._matrial=this._subject.subjectMaterial;
        },
        (error:any)=>{alert("error");}
      )
            
          })

    
  }

  redirect(id:number){

this._matrialservice.show(id).subscribe(

  (response:any)=>{

window.open (response,'_blank') ;

  },
  (error:any)=>{alert("error");}
)

  }
  downloadid(id:number,name:string){
    console.log(id);

this._matrialservice.download(id).subscribe(

  (response:any)=>{
    this.blob = new Blob([response], {type: 'application/pdf'});

    var downloadURL = window.URL.createObjectURL(response);
    var link = document.createElement('a');
    link.href = downloadURL;
    let str=name.concat(".pdf");
    link.download = str;
    link.click();
  }
)

  }
      

  


}










