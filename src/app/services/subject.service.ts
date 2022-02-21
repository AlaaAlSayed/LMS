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
   getSubjectByID(subjectID: number): Observable<Subject>
   {
    return this._httpClient.get<Subject>(`${environment.APIURL}/api/subjects/${subjectID}`);

   }
}
