
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
export class quizservice {

  constructor(private _HttpClient:HttpClient) { }
  getexams(subjectId:number){
    //console.log(`${environment.APIURL}/api/exams`);
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/subjects`));

   return this._HttpClient.get(`${environment.APIURL}/api/subjectExams/${subjectId}`);
  }
   getById(id:number):Observable<subject>{
    console.log(`${environment.APIURL}/api/subjects/${id}`);

    return this._HttpClient.get<subject>(`${environment.APIURL}/api/exams/${id}`);
   }

  postquiz(quiz:any,teacherId:number,subjectId:number){
    return this._HttpClient.post(`${environment.APIURL}/api/exams/${teacherId}/${subjectId}`,quiz);
   }

   postquestion(ques:any,examId:number,subjectId:number){
    return this._HttpClient.post(`${environment.APIURL}/api/question/${examId}/${subjectId}`,ques);
   } 
   postoption(opt:any,questionId:number){
    return this._HttpClient.post(`${environment.APIURL}/api/option/${questionId}`,opt);
   } 
  put(_subject:subject){
    return this._HttpClient.put(`${environment.APIURL}/api/exams`,_subject);
   }

   delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/exams/${id}`);
   } 

}