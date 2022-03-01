import { AdminGuard } from './guards/admin.guard';
import { AuthGuard } from './guards/auth.guard';
import { AdminDashboardComponent } from './components/admin/admin-dashboard/admin-dashboard.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes, CanActivate } from '@angular/router';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LayoutComponent } from './components/layout/layout.component';
import { HttpClientModule } from '@angular/common/http';

const routes: Routes = [
  {path: 'admin',

  component:AdminDashboardComponent,
  loadChildren: () => import('./components/admin/admin.module').then(m => m.AdminModule),canActivate:[AuthGuard,AdminGuard]
},
{
  path: 'student', 
 
  loadChildren: () => import('./components/student/student.module').then(m => m.StudentModule), canActivate:[AuthGuard]
},
{
  path: 'teacher', 
 
loadChildren: () => import('./components/teacher/teacher.module').then(m => m.TeacherModule) , canActivate:[AuthGuard]
},

{
  path: 'user', 
 
  loadChildren: () => import('./components/user/user.module').then(m => m.UserModule)
},
{path: 'profile',

component:LayoutComponent,
loadChildren: () => import('./components/profile/profile.module').then(m => m.ProfileModule)
},
{
  path: '',
  component:LayoutComponent,
loadChildren: () => import('./components/profile/profile.module').then(m => m.ProfileModule)
},
{
  path:'subject/:student_id/:id',
  loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule), canActivate:[AuthGuard]
  
}, 
 {
  path:'subject/:student_id/:id/assignment',
  loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule), canActivate:[AuthGuard]
  
},
{path:'classroom/:teacherid/:classroomid',
  loadChildren: () => import('./components/class-detail-teacher/class-detail-teacher.module').then(m => m.ClassDetailTeacherModule) , canActivate:[AuthGuard]

},
{path:'classroom/:teacherid/:classroomid/matrial',
  loadChildren: () => import('./components/class-detail-teacher/class-detail-teacher.module').then(m => m.ClassDetailTeacherModule), canActivate:[AuthGuard]

},


];
@NgModule({
  imports: [RouterModule.forRoot(routes),HttpClientModule,],
  exports: [RouterModule]
})
export class AppRoutingModule { }

// @NgModule({
//   imports: [RouterModule.forRoot(routes)],
// import { HttpClientModule } from '@angular/common/http';
// import { NgModule } from '@angular/core';
// import { RouterModule, Routes } from '@angular/router';
/* 
const routes: Routes = [
  {path:'subject/assignment',component:AssignmentComponent},
  {path:'subject/result',component:ResultComponent},
  {path:'subject/quiz',component:QuizComponent},
  {path:'subject/matrial',component:MatrialComponent},
  {path:'subject',component:MainSubjectComponent},

]; */
// const routes: Routes = [
//   {
//     path:'subject/:student_id/:id',
//     loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule)
    
//   },  {
//     path:'subject/:student_id/:id/assignment',
//     loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule)
    
//   },{path:'teacher/:id',
//     loadChildren: () => import('./components/class-detail-teacher/class-detail-teacher.module').then(m => m.ClassDetailTeacherModule)
 
//   }];

