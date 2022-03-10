import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { environment } from './../../environments/environment';


@Injectable({
  providedIn: 'root'
})
export class UserService {
  
  logged=new BehaviorSubject<boolean>(this.isLoggedIn());
  constructor(private _httpClient:HttpClient) { }
  
  postLogin(data:any)
  {
    return this._httpClient.post(`${environment.APIURL}/api/sanctum/token`, data);

    // localStorage.setItem("Token",token);
    // this.logged.next(true);
  }

  isLoggedIn():boolean
  {
   let toekn= localStorage.getItem("token");
   return toekn!=null;
  }

  logout(){
    localStorage.removeItem("token");
    localStorage.removeItem("id");
    localStorage.removeItem("roleId");

    this.logged.next(false);
  }
  getLoggedId(){
    // options={}
    return this._httpClient.get(`${environment.APIURL}/api/id`);

  }
  getUsers(){
    return this._httpClient.get(`${environment.APIURL}/api/user`);

  }
  

}
