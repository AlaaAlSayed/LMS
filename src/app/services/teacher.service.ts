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
   post(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/teachers`, data);
   }
   getClasses(id:number): Observable<TeacherTeachesSubjects[]>
   {
    return this._httpClient.get<TeacherTeachesSubjects[]>(`${environment.APIURL}/api/teachers/${id}/home`);

   }
   getTeacherSubjectClass(): Observable<TeacherTeachesSubjects[]>
   {
    return this._httpClient.get<TeacherTeachesSubjects[]>(`${environment.APIURL}/api/teachers/teaches`);
   }
   postTeacherClass(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/teachers/assign`, data);

   }
   getImage(id:number){
    return this._httpClient.get(`${environment.APIURL}/api/teachers/image/${id}`);

   }
   deleteStudent(id:number){
    return this._httpClient.delete(`${environment.APIURL}/api/teachers/${id}`);

   }
   updateData(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/teachers/${id}`, data);
   }
   updateTeaches(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/teachers/teachesUpdate/${id}`, data);

   }
   getTeaches(id1:number): Observable<TeacherTeachesSubjects>
   {
    return this._httpClient.get<TeacherTeachesSubjects>(`${environment.APIURL}/api/teachers/showClassroom/${id1}`);

   }
  }
