import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { Injectable } from '@angular/core';
declare const Pusher: any;

@Injectable({
  providedIn: 'root'
})
export class PusherService {
  pusher: any;
  messagesChannel: any;

  constructor(private _httpClient:HttpClient) { 
    this.pusher = new Pusher('3bee20a7dba542d55ac9', {
      authEndpoint: 'http://localhost:8000/pusher/auth',
    });

    this.messagesChannel = this.pusher.subscribe('private-chat');
  }
  post(data:any){
    return this._httpClient.post(`${environment.APIURL}/api/messages`, data);


  }
}
