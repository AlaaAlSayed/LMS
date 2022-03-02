import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment';
import { Admin } from './../../models/admin';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AdminService {

  constructor(private _httpClient:HttpClient) { }
  getAdminByID(id: number):Observable<Admin>
   {
    return this._httpClient.get<Admin>(`${environment.APIURL}/api/admins/${id}`);

   }
   updateData(id:number, data:any){
    return this._httpClient.put(`${environment.APIURL}/api/admins/${id}`, data);

   }
}
