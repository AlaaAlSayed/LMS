import { Classroom } from './../../models/classroom';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ClassroomService {

  constructor(private _httpClient:HttpClient) { }
  get():Observable<Classroom[]>

  {
    return this._httpClient.get<Classroom[]>(`${environment.APIURL}/api/classrooms`);
   }
   getStudentByID(id: number):Observable<Classroom>

   {
    return this._httpClient.get<Classroom>(`${environment.APIURL}/api/classrooms/${id}`);

   }
   post(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/classrooms`, data);
   }
   deleteClass(id:number){
    return this._httpClient.delete(`${environment.APIURL}/api/classrooms/${id}`);
   }
   updateData(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/classrooms/${id}`, data);
   }
}
