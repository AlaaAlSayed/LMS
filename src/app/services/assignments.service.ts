
import { subject } from 'src/app/models/subject';
import { Injectable } from '@angular/core';
import { environment} from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class assignmentsservice {

  constructor(private _HttpClient:HttpClient) { }
  get(subjectId:number){
    console.log(`${environment.APIURL}/api/subjectAssignments/${subjectId}`);
    //console.log(this._HttpClient.get(`${environment.api_URL}/api/subjects`));

   return this._HttpClient.get(`${environment.APIURL}/api/subjectAssignments/${subjectId}`);
  }
   getById(assignmentId:number){
    //console.log(`${environment.APIURL}/api/assignments/${id}`);
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/assignments/${id}`));
    return this._HttpClient.get(`${environment.APIURL}/api/deadline/${assignmentId}`);
   }
   show(assignmentid:number){
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/showpdf/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/assignments/${assignmentid}`);
  }

  download(assignmentid:number){
   const httpOptions = {
     responseType: 'blob' as 'json'
   };
   //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
  return this._HttpClient.get(`${environment.APIURL}/api/assignments/download/${assignmentid}`,httpOptions);
 }

  post(_assignment:any,teacherid:number,subjectid:number){
    return this._HttpClient.post(`${environment.APIURL}/api/assignments/${teacherid}/${subjectid}`,_assignment);
   }
   postanswer(_assignment:any){
    return this._HttpClient.post(`${environment.APIURL}/api/students/upload`,_assignment);
   }
   
  put(_subject:subject){
    return this._HttpClient.put(`${environment.APIURL}/api/assignments`,_subject);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/assignments/${id}`);
   } 
   getuploads(){
    return this._HttpClient.get(`${environment.APIURL}/api/assignments/studentsUploads`);

   }
   getfile(assignmentId:number){
    const httpOptions = {
      responseType: 'blob' as 'json'
    };
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/assignments/getFile/${assignmentId}`,httpOptions);
  }
}