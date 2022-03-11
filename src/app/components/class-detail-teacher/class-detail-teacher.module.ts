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
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { UpdatematerialComponent } from './updatematerial/updatematerial.component';
import { UpdateassignmentComponent } from './updateassignment/updateassignment.component';
import { AuthGuard } from 'src/app/guards/auth.guard';
import { TeacherHeaderComponent } from '../teacher/teacher-header/teacher-header.component';

const routes: Routes = [
  {path:'assignment',component:TechassignmentComponent},
  {path:'quiz',component:TechquizComponent},
  {path:'matrial',component:TechmatrialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'',component:TechsubjectmainComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'matrial/creatematrial',component:CreateMatrialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/createassignment',component:CreateAssignmentComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/updateassignment/:assignmentid',component:UpdateassignmentComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'matrial/updatematrial/:matrialid',component:UpdatematerialComponent,canActivate:[AuthGuard,TeacherGuard]},];





@NgModule({
  declarations: [
    TechmatrialComponent,
    TechassignmentComponent,
    TechquizComponent,
    TechsubjectmainComponent,
    CreateMatrialComponent,
    CreateAssignmentComponent,
    UpdatematerialComponent,
    UpdateassignmentComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),HttpClientModule,ReactiveFormsModule,FormsModule
    
  ],
  exports:[
  ]
 
})
export class ClassDetailTeacherModule { }




