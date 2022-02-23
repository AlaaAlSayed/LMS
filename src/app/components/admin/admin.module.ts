import { NgModule, Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { Routes, RouterModule } from '@angular/router';
// import { NgChartsModule } from 'ng2-charts';
import { AdminProfileComponent } from './admin-profile/admin-profile.component';
import { AddStudentComponent } from './add-student/add-student.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ViewStudentsComponent } from './view-students/view-students.component';
import { DetailsStudentComponent } from './details-student/details-student.component';
import { ViewTeachersComponent } from './view-teachers/view-teachers.component';
import { AddTeacherComponent } from './add-teacher/add-teacher.component';
import { DetailsTeacherComponent } from './details-teacher/details-teacher.component';
import { EditStudentComponent } from './edit-student/edit-student.component';
import { EditTeacherComponent } from './edit-teacher/edit-teacher.component';


const routes: Routes = [
  {path:'home',component:HomeComponent},
  {path: 'profile', component:AdminProfileComponent},
  {path: 'addStudent', component:AddStudentComponent},
  {path: 'view-students', component:ViewStudentsComponent},
  {path: 'details-student/:id',component:DetailsStudentComponent},
  {path:'addTeacher', component:AddTeacherComponent},
  {path: 'view-teachers',component:ViewTeachersComponent},
  {path: 'details-teacher/:id', component:DetailsTeacherComponent},
  {path: 'edit-student/:id', component:EditStudentComponent},
  {path: 'edit-teacher/:id', component:EditTeacherComponent}
]

@NgModule({
  declarations: [
    HomeComponent,
    AdminProfileComponent,
    AddStudentComponent,
    ViewStudentsComponent,
    DetailsStudentComponent,
    ViewTeachersComponent,
    AddTeacherComponent,
    DetailsTeacherComponent,
    EditStudentComponent,
    EditTeacherComponent,
  
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),ReactiveFormsModule,FormsModule
  ]
})
export class AdminModule { }
