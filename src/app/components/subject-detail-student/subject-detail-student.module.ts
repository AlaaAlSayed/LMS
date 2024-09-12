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
import { ShowassignmentComponent } from './showassignment/showassignment.component';
import { SharedModule } from '../shared/shared.module';

enableProdMode();

const routes: Routes = [
  {
    path:'assignment',component:AssignmentComponent
  }, {
    path:'show/:assignid',component:ShowassignmentComponent
  },

  {path:'result',component:ResultComponent},
  {path:'quiz',component:QuizComponent},
  {path:'matrial',component:MatrialComponent},
  {path:'',component:MainSubjectComponent}

];
@NgModule({
  declarations: [
    AssignmentComponent,
    QuizComponent,
    MatrialComponent,
    ResultComponent,
    MainSubjectComponent,
    ShowassignmentComponent
  ],
  imports: [
    
    CommonModule,RouterModule.forChild(routes),HttpClientModule,SharedModule
    
  ]
})
export class SubjectDetailStudentModule { }
