import { Injectable } from '@angular/core';
import { environment} from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class AnnocementService {

  constructor(private _HttpClient:HttpClient) { }

  post(_anoccement:any){
    console.log(`${environment.APIURL}/api/annoncemetns`);
    return this._HttpClient.post(`${environment.APIURL}/api/annoncemetns`,_anoccement);
   }
}
