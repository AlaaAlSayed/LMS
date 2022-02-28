import { matrial } from 'src/app/models/matrial';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MatrialService {
  constructor(private _HttpClient:HttpClient) { }
 
   getSubjectById(teacherid:number,classroomid:number){
    
    //console.log(`${environment.APIURL}/api/subjects/teacher/${teacherid}/classroom/${classroomid}`);
    return this._HttpClient.get(`${environment.APIURL}/api/subjects/teacher/${teacherid}/classroom/${classroomid}`);
   }

  post(_matrial:any){
    return this._HttpClient.post(`${environment.APIURL}/api/materials`,_matrial);
   }

   show(matrialid:number){
     //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/showpdf/${matrialid}`));
    return this._HttpClient.get(`${environment.APIURL}/api/materials/showpdf/${matrialid}`);
   }

   download(matrialid:number){
    const httpOptions = {
      responseType: 'blob' as 'json'
    };
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`,httpOptions);
  }
  getfile(matrialid:number){
    const httpOptions = {
      responseType: 'blob' as 'json'
    };
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/materials/getFile/${matrialid}`,httpOptions);
  }
  put(id:number,_matrial:any){
 
    return this._HttpClient.put(`${environment.APIURL}/api/materials/${id}`,_matrial);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/materials/${id}`);
   } 

 getmatrialbyid(id:number){
    return this._HttpClient.get(`${environment.APIURL}/api/materials/${id}`);
   } 

}
