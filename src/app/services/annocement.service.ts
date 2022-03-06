import { Injectable } from '@angular/core';
import { environment} from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class AnnocementService {

  constructor(private _HttpClient:HttpClient) { }

  post(_anoccement:any){
    return this._HttpClient.post(`${environment.APIURL}/api/annoncemetns`,_anoccement);
   }

   getbyid(id:number){
    return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns/${id}`);
   }
   getfile(annocementId:number){
    const httpOptions = {
      responseType: 'blob' as 'json'
    };
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns/getFile/${annocementId}`,httpOptions);
  }

}
