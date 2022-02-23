import { Teacher } from './../../models/teacher';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment';
import { TeacherTeachesSubjects } from 'src/models/teacher_teaches_subjects';



@Injectable({
  providedIn: 'root'
})
export class TeacherService {

  constructor(private _httpClient:HttpClient) { }
  get(): Observable<Teacher[]>
  {
    return this._httpClient.get<Teacher[]>(`${environment.APIURL}/api/teachers`);
   }
   getTeacherByID(id: number): Observable<Teacher>
   {
    return this._httpClient.get<Teacher>(`${environment.APIURL}/api/teachers/${id}`);

   }
   getClasses(id:number): Observable<TeacherTeachesSubjects[]>
   {
    return this._httpClient.get<TeacherTeachesSubjects[]>(`${environment.APIURL}/api/teachers/${id}/home`);

   }
   getImage(id:number){
    return this._httpClient.get(`${environment.APIURL}/api/teachers/image/${id}`);

   }
  }
