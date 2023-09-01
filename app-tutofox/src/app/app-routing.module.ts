import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

export const router: Routes =[
  {
    path:'',
    loadChildren:() => import('./modules/home/home.module').then(m => m.HomeModule)
  },
  {
    path:'',
    redirectTo:'/',
    pathMatch:'full'
  },
  {
    path:'**',
    redirectTo:'error/404'
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(router)
  ],
  exports:[
    RouterModule
  ]
})
export class AppRoutingModule { }
