
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
 
  constructor(private _httpClient:HttpClient) { }
  get(url:string){
    return this._httpClient.get(`${environment.APIURL}/${url}`);
   }
 
   post(url:string,body:any){
     return this._httpClient.post(`${environment.APIURL}/${url}`,body);
    }
 
    
   put(url:string,body:any){
     return this._httpClient.put(`${environment.APIURL}/${url}`,body);
    }
 
    delete(url:string){
     return this._httpClient.delete(`${environment.APIURL}/${url}`);
    }
}
