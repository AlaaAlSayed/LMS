import { SubjectService } from './subject.service';
import { Student } from './../../models/student';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment';
import {Subject} from '../../models/subject';

@Injectable({
  providedIn: 'root'
})
export class StudentService {

// httpOption;
  constructor(private _httpClient:HttpClient) {
    // this.httpOption = {
    //   headers: new HttpHeaders({
    //     'Content-Type': 'application/x-www-form-urlencoded'
    //     // 'Content-Type': 'multipart/form-data'
    //   })
    // };
   }
  get()
  // Observable<Student[]>
  {
    return this._httpClient.get(`${environment.APIURL}/api/students`);
   }
   getStudentByID(id: number):Observable<Student>
  //  Observable<Student>
   {
    return this._httpClient.get<Student>(`${environment.APIURL}/api/students/${id}`);

   }
   post(data:Student){
    return this._httpClient.post(`${environment.APIURL}/api/students`, data);
   }
}
