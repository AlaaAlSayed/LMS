
import { subject } from 'src/app/models/subject';
import { Injectable } from '@angular/core';
import { environment} from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { Observable } from 'rxjs';
import { NgModule } from '@angular/core';
@Injectable({
  providedIn: 'root'
})
export class assignmentsservice {

  constructor(private _HttpClient:HttpClient) { }
  get(){
    console.log(`${environment.APIURL}/api/assignments`);
    //console.log(this._HttpClient.get(`${environment.api_URL}/api/subjects`));

   return this._HttpClient.get(`${environment.APIURL}/api/assignments`);
  }
   getById(id:number){
    console.log(`${environment.APIURL}/api/assignments/${id}`);
    console.log(this._HttpClient.get(`${environment.APIURL}/api/assignments/${id}`));
    return this._HttpClient.get(`${environment.APIURL}/api/assignments/${id}`);
   }

  post(_subject:subject){
    return this._HttpClient.post(`${environment.APIURL}/api/assignments`,_subject);
   }

   
  put(_subject:subject){
    return this._HttpClient.put(`${environment.APIURL}/api/assignments`,_subject);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/assignments/${id}`);
   } 

}