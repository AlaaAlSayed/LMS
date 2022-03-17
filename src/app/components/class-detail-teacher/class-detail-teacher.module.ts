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
import { CreatequizComponent } from './createquiz/createquiz.component';
import { CreatequestionComponent } from './createquestion/createquestion.component';
import { CreateoptionComponent } from './createoption/createoption.component';
import { HeaderComponent } from './header/header.component';
import {​​​​​​​​ NgbModule }​​​​​​​​ from '@ng-bootstrap/ng-bootstrap';
import { SharedModule } from '../shared/shared.module';
import { StuedentuploasComponent } from './stuedentuploas/stuedentuploas.component';
import { UploadassignmentComponent } from '../subject-detail-student/uploadassignment/uploadassignment.component';
import { DetailofuplodComponent } from './detailofuplod/detailofuplod.component';


const routes: Routes = [
  {path:'assignment',component:TechassignmentComponent},
  {path:'quiz',component:TechquizComponent},
  {path:'matrial',component:TechmatrialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'',component:TechsubjectmainComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'matrial/creatematrial',component:CreateMatrialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/createassignment',component:CreateAssignmentComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/updateassignment/:assignmentid',component:UpdateassignmentComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'matrial/updatematrial/:matrialid',component:UpdatematerialComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'quiz/createquiz',component:CreatequizComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'quiz/createquiz/:quizid/:quizname/createquestion',component:CreatequestionComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'quiz/createquiz/:quizid/:quizname/createquestion/:questionid/createoption',component:CreateoptionComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/uploasassignment/:assignmentid',component:StuedentuploasComponent,canActivate:[AuthGuard,TeacherGuard]},
  {path:'assignment/uploasassignment/:assignmentid/detail/:upid',component:DetailofuplodComponent,canActivate:[AuthGuard,TeacherGuard]},


];





@NgModule({
  declarations: [
    TechmatrialComponent,
    TechassignmentComponent,
    TechquizComponent,
    TechsubjectmainComponent,
    CreateMatrialComponent,
    CreateAssignmentComponent,
    UpdatematerialComponent,
    UpdateassignmentComponent,
    CreatequizComponent,
    CreatequestionComponent,
    CreateoptionComponent,
    HeaderComponent,
    StuedentuploasComponent,
    DetailofuplodComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),HttpClientModule,ReactiveFormsModule,FormsModule,NgbModule,SharedModule
    
  ],
  exports:[
  ]
 
})
export class ClassDetailTeacherModule { }




