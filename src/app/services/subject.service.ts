import { environment } from '../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import {Subject} from '../../models/subject';
@Injectable({
  providedIn: 'root'
})
export class SubjectService {

  constructor(private _httpClient:HttpClient) { }
  get(): Observable<Subject[]>
  {
    return this._httpClient.get<Subject[]>(`${environment.APIURL}/api/subjects`);
   }
   /* getSubjectByID(subjectID: any): Observable<Subject>
   {
    console.log(subjectID);
     console.log(`${environment.APIURL}/api/subjects/${subjectID}`);
    } */
     getSubjectByID(subjectID: number): Observable<Subject>
   {
    return this._httpClient.get<Subject>(`${environment.APIURL}/api/subjects/${subjectID}`);

   }
   getSubject(id:number): Observable<Subject>
   {
    return this._httpClient.get<Subject>(`${environment.APIURL}/api/subjects/showSubject/${id}`);


   }
   post(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/subjects`, data);
   }
   deleteSubject(id:number){
    return this._httpClient.delete(`${environment.APIURL}/api/subjects/${id}`);
   }
   updateData(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/subjects/${id}`, data);
   }
}
