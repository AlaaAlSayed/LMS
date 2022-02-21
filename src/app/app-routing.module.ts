import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainSubjectComponent } from './components/subject-detail-student/main-subject/main-subject.component';
/* 
const routes: Routes = [
  {path:'subject/assignment',component:AssignmentComponent},
  {path:'subject/result',component:ResultComponent},
  {path:'subject/quiz',component:QuizComponent},
  {path:'subject/matrial',component:MatrialComponent},
  {path:'subject',component:MainSubjectComponent},

]; */
const routes: Routes = [
  {
    path:'subject/:student_id/:id',
    loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule)
    
  },  {
    path:'subject/:student_id/:id/assignment',
    loadChildren: () => import('./components/subject-detail-student/subject-detail-student.module').then(m => m.SubjectDetailStudentModule)
    
  },{path:'teacher/:id',
    loadChildren: () => import('./components/class-detail-teacher/class-detail-teacher.module').then(m => m.ClassDetailTeacherModule)
 
  }];
@NgModule({
  imports: [RouterModule.forRoot(routes),HttpClientModule,],
  exports: [RouterModule]
})
export class AppRoutingModule { }
