import { Student } from './../../models/student';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from './../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class StudentService {

  constructor(private _httpClient:HttpClient) { }
  get(): Observable<Student[]>
  {
    return this._httpClient.get<Student[]>(`${environment.APIURL}/api/students`);
   }
   getStudentByID(id: number): Observable<Student>
   {
    return this._httpClient.get<Student>(`${environment.APIURL}/api/students/${id}`);

   }
}
