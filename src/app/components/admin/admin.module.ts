import { AdminDashboardComponent } from './admin-dashboard/admin-dashboard.component';
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
import { AddClassroomComponent } from './add-classroom/add-classroom.component';
import { EditClassroomComponent } from './edit-classroom/edit-classroom.component';
import { ViewClassroomsComponent } from './view-classrooms/view-classrooms.component';
import { AddSubjectComponent } from './add-subject/add-subject.component';
import { EditSubjectComponent } from './edit-subject/edit-subject.component';
import { ViewSubjectsComponent } from './view-subjects/view-subjects.component';
import { EditAssignTeacherComponent } from './edit-assign-teacher/edit-assign-teacher.component';
import { EditAdminComponent } from './edit-admin/edit-admin.component';


const routes: Routes = [
  {path:'home',component:HomeComponent},
  {path: 'profile/:id', component:AdminProfileComponent},
  {path: 'addStudent', component:AddStudentComponent},
  {path: 'view-students', component:ViewStudentsComponent},
  {path: 'details-student/:id',component:DetailsStudentComponent},
  {path:'addTeacher', component:AddTeacherComponent},
  {path: 'view-teachers',component:ViewTeachersComponent},
  {path: 'details-teacher/:id', component:DetailsTeacherComponent},
  {path: 'edit-student/:id', component:EditStudentComponent},
  {path: 'edit-teacher/:id', component:EditTeacherComponent},
  {path: 'view-classrooms', component:ViewClassroomsComponent},
  {path: 'add-classroom', component:AddClassroomComponent},
  {path: 'edit-classroom/:id',component:EditClassroomComponent},
  {path: 'add-subject', component:AddSubjectComponent},
  {path: 'edit-subject/:id', component:EditSubjectComponent},
  {path: 'view-subjects',component:ViewSubjectsComponent},
  {path: 'edit-assign/:id/:id', component:EditAssignTeacherComponent},
  {path: 'edit-admin/:id',component:EditAdminComponent},
  {path: 'dashboard',component:AdminDashboardComponent}
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
    AddClassroomComponent,
    EditClassroomComponent,
    ViewClassroomsComponent,
    AddSubjectComponent,
    EditSubjectComponent,
    ViewSubjectsComponent,
    EditAssignTeacherComponent,
    EditAdminComponent,
    AdminDashboardComponent,
  
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),ReactiveFormsModule,FormsModule
  ]
})
export class AdminModule { }
