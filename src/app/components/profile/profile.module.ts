import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AboutComponent } from './about/about.component';
import { HomeComponent } from './home/home.component';
import { ContactComponent } from './contact/contact.component';
import { Routes, RouterModule } from '@angular/router'

const routes: Routes = [
  {path:'home',component:HomeComponent},
  {path:'about',component:AboutComponent},
  {path:'contact',component:ContactComponent},
  {path:'',component:HomeComponent}
  ];

@NgModule({
  declarations: [
    AboutComponent,
    HomeComponent,
    ContactComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes)
  ]
})
export class ProfileModule { }
