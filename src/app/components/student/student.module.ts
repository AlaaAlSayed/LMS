
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StudentHeaderComponent } from './student-header/student-header.component';
import { StudentHomeComponent } from './student-home/student-home.component';
import { Routes, RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { StudentProfileComponent } from './student-profile/student-profile.component';

const routes: Routes = [
  {path:'header',component:StudentHeaderComponent},
  {path:'home',component:StudentHomeComponent},
  {path:'profile/:id',component:StudentProfileComponent},
  {path:'',component:StudentHomeComponent}
  ];

@NgModule({
  declarations: [
    StudentHeaderComponent,
    StudentHomeComponent,
    StudentProfileComponent,
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule
  ]
})
export class StudentModule { }
