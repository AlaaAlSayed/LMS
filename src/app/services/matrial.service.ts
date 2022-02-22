import { matrial } from 'src/app/models/matrial';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MatrialService {
  constructor(private _HttpClient:HttpClient) { }
  get(){
    console.log(`${environment.APIURL}/api/exams`);
    //console.log(this._HttpClient.get(`${environment.api_URL}/api/subjects`));

   return this._HttpClient.get(`${environment.APIURL}/api/exams`);
  }
   getById(id:number){
    console.log(`${environment.APIURL}/api/subjects/${id}`);

    return this._HttpClient.get(`${environment.APIURL}/api/exams/${id}`);
   }

  post(_matrial:matrial){
    return this._HttpClient.post(`${environment.APIURL}/api/exams`,_matrial);
   }

   
  put(_matrial:matrial){
    return this._HttpClient.put(`${environment.APIURL}/api/exams`,_matrial);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/exams/${id}`);
   } 

}
