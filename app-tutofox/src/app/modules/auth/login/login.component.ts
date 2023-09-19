import { Component,OnInit } from '@angular/core';
import { AuthService } from '../service/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
 
  username:string = "";
  password:string = "";

  constructor(
    public authService: AuthService,
    public router: Router) {
 
    
  }
  

  ngOnInit(): void {
   
  }

  login() {

    const user = {username: this.username, password:this.password};
    this.authService.login(user).subscribe((resp:any) =>{
      console.log(resp);
       if(!resp.error)
       {
          console.log(resp);
       }
       else
       {
          if(!resp.error.status)
          {
            console.log(resp.error.mensaje);           
          }
          else
          {
            console.log(resp.error);
          }
         
       }
    });    
  }

 
}
