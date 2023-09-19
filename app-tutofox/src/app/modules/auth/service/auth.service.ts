import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router} from '@angular/router';
import {catchError, map} from 'rxjs/operators';
import {of,Observable, throwError} from 'rxjs';
import { URL_SERVICIO } from 'src/app/config/config';
import { Usuario } from 'src/app/models/usuario';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  user:any = null;
  token:any = null;

  constructor(
    private http: HttpClient,
    private router: Router) { }

  login(user:any): Observable<any>{
    let url = URL_SERVICIO + "/login";
    return this.http.post(url,{ usernom:user.username,password:user.password }).pipe(
      map((resp:any) =>{
        return resp;
      }),
      catchError((error:any) =>{
        return of(error);
      })
    );
  }

  setLocalStorage(token:string, user:Usuario){
    localStorage.setItem("token",token);
    localStorage.setItem("usuario",JSON.stringify(user));
  }

  getLocalStorage(){
    if(localStorage.getItem("token"))
    {
      this.token = localStorage.getItem('token');
      this.user = JSON.parse(localStorage.getItem('usuario') ?? '');
    }
    else{
      this.user = null;
      this.token = null;
    }
  }


}
