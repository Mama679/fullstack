import { Injectable } from '@angular/core';
import {HttpClient,HttpHeaders} from '@angular/common/http';
import { Router } from '@angular/router';
import {catchError, map} from 'rxjs/operators';
import {of,Observable, throwError} from 'rxjs';

import { URL_SERVICIO } from 'src/app/config/config';
import { Usuario } from 'src/app/models/usuario';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  token:any = null;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept':'application/json'
    })
 }

  constructor(
    private http:HttpClient,
    private router:Router
  ) { }

  login(usuario:string, clave:string){
    let url = URL_SERVICIO + "api/login";
    return this.http.post();
  }
}
