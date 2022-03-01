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

enableProdMode();

const routes: Routes = [
  {
    path:'assignment',component:AssignmentComponent
  },

  {path:'result',component:ResultComponent},
  {path:'quiz',component:QuizComponent},
  {path:'matrial',component:MatrialComponent},
  {path:'uploadassignment/:assignmentid',component:UploadassignmentComponent},

  {path:'',component:MainSubjectComponent}

];
@NgModule({
  declarations: [
    AssignmentComponent,
    QuizComponent,
    MatrialComponent,
    ResultComponent,
    MainSubjectComponent,
    UploadassignmentComponent,
  ],
  imports: [
    
    CommonModule,RouterModule.forChild(routes),HttpClientModule,SharedModule,ReactiveFormsModule
    
  ]
})
export class SubjectDetailStudentModule { }
