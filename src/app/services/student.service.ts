// import { Student } from 'src/models/student';
import { SubjectService } from './subject.service';
import { Student } from './../../models/student';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment';
import {Subject} from '../../models/subject';
import { Notifications } from 'src/models/notifications';

@Injectable({
  providedIn: 'root'
})
export class StudentService {
// id=`${localStorage.getItem('id')}`;
// httpOption;
  constructor(private _httpClient:HttpClient) {
    // this.httpOption = {
    //   headers: new HttpHeaders({
    //     'Content-Type': 'application/x-www-form-urlencoded'
    //     // 'Content-Type': 'multipart/form-data'
    //   })
    // };
   }
  get():Observable<Student[]>
  // Observable<Student[]>
  {
    return this._httpClient.get<Student[]>(`${environment.APIURL}/api/students`);
   }
   getStudentByID(id: number):Observable<Student>
  //  Observable<Student>
   {
    return this._httpClient.get<Student>(`${environment.APIURL}/api/students/${id}`);

   }
   post(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/students`, data);
   }
   getSubjects(id:number): Observable<Subject[]>
   {
    return this._httpClient.get<Subject[]>(`${environment.APIURL}/api/students/${id}/home`);

   }
   getImage(id:number)
   {
    return this._httpClient.get(`${environment.APIURL}/api/students/image/${id}`);

   }
   deleteStudent(id:number){
    return this._httpClient.delete(`${environment.APIURL}/api/students/${id}`);

   }
   updateData(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/students/${id}`, data);
   }
   getNotification(): Observable<Notifications[]>{
    return this._httpClient.get<Notifications[]>(`${environment.APIURL}/api/notifications`);
   }
}
