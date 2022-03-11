
import { StudentGuard } from './../../guards/student.guard';

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StudentHeaderComponent } from './student-header/student-header.component';
import { StudentHomeComponent } from './student-home/student-home.component';
import { Routes, RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { StudentProfileComponent } from './student-profile/student-profile.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AuthGuard } from 'src/app/guards/auth.guard';
import { AdminGuard } from 'src/app/guards/admin.guard';

const routes: Routes = [
  {path:'header',component:StudentHeaderComponent,canActivate:[AuthGuard,StudentGuard]},
// data:{
//   role:[1, 3]
// }},
  {path:'home/:id',component:StudentHomeComponent,canActivate:[AuthGuard,StudentGuard]},
  // ,data:{
  //   role:[1, 3]
  // }},
  {path:'profile/:id',component:StudentProfileComponent,canActivate:[AuthGuard,StudentGuard]},
  // ,data:{
  //   role:[1, 3]
  // }},
  {path:'',component:StudentHomeComponent,canActivate:[AuthGuard,StudentGuard]},
  // ,data:{
  //   role:[1, 3]
  // }}
  ];

@NgModule({
  declarations: [
    StudentHeaderComponent,
    StudentHomeComponent,
    StudentProfileComponent,
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule,ReactiveFormsModule,FormsModule
  ],
  exports:[
    StudentHeaderComponent
  ]

})
export class StudentModule { }
