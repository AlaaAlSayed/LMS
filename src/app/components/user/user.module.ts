import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { LoginComponent } from './login/login.component';
import { Routes, RouterModule } from '@angular/router';
const routes: Routes = [
  {path:'login',component:LoginComponent},
]
@NgModule({
  declarations: [LoginComponent],
  imports: [
    CommonModule,RouterModule.forChild(routes),ReactiveFormsModule,FormsModule
  ]
})
export class UserModule { }
