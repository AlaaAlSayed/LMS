import { StudentGuard } from './../../guards/student.guard';
// import { StudentModule } from './../student/student.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes} from '@angular/router';
import { AssignmentComponent } from './assignment/assignment.component';
import { MainSubjectComponent } from './main-subject/main-subject.component';
import { MatrialComponent } from './matrial/matrial.component';
import { QuizComponent } from './quiz/quiz.component';
import { ResultComponent } from './result/result.component';
import { HttpClientModule } from '@angular/common/http';
import { enableProdMode } from '@angular/core';
import { SharedModule } from '../shared/shared.module';
import { UploadassignmentComponent } from './uploadassignment/uploadassignment.component';
import { ReactiveFormsModule } from '@angular/forms';
import { AuthGuard } from 'src/app/guards/auth.guard';
// import { StudentModule } from '../student/student.module';

enableProdMode();

const routes: Routes = [
  {
    path:'assignment',component:AssignmentComponent,canActivate:[AuthGuard,StudentGuard]
  },

  {path:'result',component:ResultComponent,canActivate:[AuthGuard,StudentGuard]},
  {path:'quiz',component:QuizComponent,canActivate:[AuthGuard,StudentGuard]},
  {path:'matrial',component:MatrialComponent,canActivate:[AuthGuard,StudentGuard]},
  {path:'uploadassignment/:assignmentid',component:UploadassignmentComponent,canActivate:[AuthGuard,StudentGuard]},

  {path:'',component:MainSubjectComponent,canActivate:[AuthGuard,StudentGuard]}

];
@NgModule({
  declarations: [
    AssignmentComponent,
    QuizComponent,
    MatrialComponent,
    ResultComponent,
    MainSubjectComponent,
    UploadassignmentComponent,
    //StudentHeaderComponent
  ],
  imports: [
    
    CommonModule,RouterModule.forChild(routes),HttpClientModule,SharedModule,ReactiveFormsModule
    // ,StudentModule
    
  ]
})
export class SubjectDetailStudentModule { }
