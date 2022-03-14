import { TeacherGuard } from './../../guards/teacher.guard';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TeacherHeaderComponent } from './teacher-header/teacher-header.component';
import { TeacherHomeComponent } from './teacher-home/teacher-home.component';
import { TeacherProfileComponent } from './teacher-profile/teacher-profile.component';
import { Routes, RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { AuthGuard } from 'src/app/guards/auth.guard';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

const routes: Routes = [
  {path:'header',component:TeacherHeaderComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'home/:id',component:TeacherHomeComponent,canActivate:[AuthGuard,TeacherGuard]},
  // {path:'home',component:TeacherHomeComponent},
  {path:'profile/:id',component:TeacherProfileComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'',component:TeacherHomeComponent,canActivate:[AuthGuard,TeacherGuard]}
  ];

@NgModule({
  declarations: [
    TeacherHeaderComponent,
    TeacherHomeComponent,
    TeacherProfileComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule,NgbModule
    
  ]
})
export class TeacherModule { }
