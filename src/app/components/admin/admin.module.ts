import { NgModule, Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { Routes, RouterModule } from '@angular/router';
import { NgChartsModule } from 'ng2-charts';
import { AdminProfileComponent } from './admin-profile/admin-profile.component';
import { AddStudentComponent } from './add-student/add-student.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


const routes: Routes = [
  {path:'home',component:HomeComponent},
  {path: 'profile', component:AdminProfileComponent},
  {path: 'addStudent', component:AddStudentComponent}
]

@NgModule({
  declarations: [
    HomeComponent,
    AdminProfileComponent,
    AddStudentComponent,
  
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),NgChartsModule
  ]
})
export class AdminModule { }
