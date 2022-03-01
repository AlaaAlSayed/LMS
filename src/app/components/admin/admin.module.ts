import { TokenInterceptor } from './../../token.interceptor';
import { AdminGuard } from './../../guards/admin.guard';
import { AuthGuard } from './../../guards/auth.guard';
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
import { HTTP_INTERCEPTORS } from '@angular/common/http';


const routes: Routes = [
  {path:'home',component:HomeComponent, canActivate:[AuthGuard,AdminGuard]},
  {path: 'admin-profile/:id', component:AdminProfileComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'addStudent', component:AddStudentComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'view-students', component:ViewStudentsComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'details-student/:id',component:DetailsStudentComponent,canActivate:[AuthGuard,AdminGuard]},
  {path:'addTeacher', component:AddTeacherComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'view-teachers',component:ViewTeachersComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'details-teacher/:id', component:DetailsTeacherComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-student/:id', component:EditStudentComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-teacher/:id', component:EditTeacherComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'view-classrooms', component:ViewClassroomsComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'add-classroom', component:AddClassroomComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-classroom/:id',component:EditClassroomComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'add-subject', component:AddSubjectComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-subject/:id', component:EditSubjectComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'view-subjects',component:ViewSubjectsComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-assign/:id/:id/:id', component:EditAssignTeacherComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'edit-admin/:id',component:EditAdminComponent,canActivate:[AuthGuard,AdminGuard]},
  {path: 'dashboard',component:AdminDashboardComponent , canActivate:[AuthGuard,AdminGuard]}
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
  ],
  // providers: [{
  //   provide: HTTP_INTERCEPTORS,
  //   useClass: TokenInterceptor,
  //   multi: true
  // }],
})
export class AdminModule { }
