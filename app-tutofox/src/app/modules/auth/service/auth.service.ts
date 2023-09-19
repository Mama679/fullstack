import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router} from '@angular/router';
import {catchError, map} from 'rxjs/operators';
import {of} from 'rxjs';
import { URL_SERVICIO } from 'src/app/config/config';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor() { }
}
