
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
export class subjectservice {

  constructor(private _HttpClient:HttpClient) { }
  get(){
    console.log(`${environment.api_URL}/api/exams`);
    //console.log(this._HttpClient.get(`${environment.api_URL}/api/subjects`));

   return this._HttpClient.get(`${environment.api_URL}/api/exams`);
  }
   getById(id:number):Observable<subject>{
    console.log(`${environment.api_URL}/api/subjects/${id}`);

    return this._HttpClient.get<subject>(`${environment.api_URL}/api/exams/${id}`);
   }

  post(_subject:subject){
    return this._HttpClient.post(`${environment.api_URL}/api/exams`,_subject);
   }

   
  put(_subject:subject){
    return this._HttpClient.put(`${environment.api_URL}/api/exams`,_subject);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.api_URL}/api/exams/${id}`);
   } 

}