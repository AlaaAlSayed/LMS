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

   getbyidpic(id:number){
    return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns/${id}`);
   }
   getbyid(id:number){
    return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns/showpost/${id}`);
   }
   getfile(annocementId:number){
    const httpOptions = {
      responseType: 'blob' as 'json'
    };
    //console.log(this._HttpClient.get(`${environment.APIURL}/api/materials/download/${matrialid}`));
   return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns/getFile/${annocementId}`,httpOptions);
  }
  put(annocementId:number,_anoccement:any){
    return this._HttpClient.put(`${environment.APIURL}/api/annoncemetns/${annocementId}`,_anoccement);

  }
  delete(id:number){
    return this._HttpClient.delete(`${environment.APIURL}/api/annoncemetns/${id}`);
   } 
   get(){
    return this._HttpClient.get(`${environment.APIURL}/api/annoncemetns`);

   }
}
