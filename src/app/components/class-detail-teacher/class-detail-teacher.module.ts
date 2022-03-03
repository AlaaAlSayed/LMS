import { TeacherGuard } from './../../guards/teacher.guard';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes, CanActivate } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { TechmatrialComponent } from './techmatrial/techmatrial.component';
import { TechassignmentComponent } from './techassignment/techassignment.component';
import { TechquizComponent } from './techquiz/techquiz.component';
import { TechsubjectmainComponent } from './techsubjectmain/techsubjectmain.component';
import { CreateMatrialComponent } from './create-matrial/create-matrial.component';
import { CreateAssignmentComponent } from './create-assignment/create-assignment.component';
import { AuthGuard } from 'src/app/guards/auth.guard';

const routes: Routes = [
  {path:'assignment',component:TechassignmentComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'quiz',component:TechquizComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'matrial',component:TechmatrialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'',component:TechsubjectmainComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'creatematrial',component:CreateMatrialComponent,canActivate:[AuthGuard,TeacherGuard]},

];

@NgModule({
  declarations: [
    TechmatrialComponent,
    TechassignmentComponent,
    TechquizComponent,
    TechsubjectmainComponent,
    CreateMatrialComponent,
    CreateAssignmentComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),HttpClientModule
  ]
})
export class ClassDetailTeacherModule { }




