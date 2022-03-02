import { TeacherGuard } from './../../guards/teacher.guard';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TeacherHeaderComponent } from './teacher-header/teacher-header.component';
import { TeacherHomeComponent } from './teacher-home/teacher-home.component';
import { TeacherProfileComponent } from './teacher-profile/teacher-profile.component';
import { Routes, RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { AuthGuard } from 'src/app/guards/auth.guard';

const routes: Routes = [
  {path:'header',component:TeacherHeaderComponent,canActivate:[TeacherGuard]},
  {path:'home/:id',component:TeacherHomeComponent,canActivate:[TeacherGuard]},
  // {path:'home',component:TeacherHomeComponent},
  {path:'profile/:id',component:TeacherProfileComponent,canActivate:[TeacherGuard]},
  {path:'',component:TeacherHomeComponent,canActivate:[TeacherGuard]}
  ];

@NgModule({
  declarations: [
    TeacherHeaderComponent,
    TeacherHomeComponent,
    TeacherProfileComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule
    
  ]
})
export class TeacherModule { }
