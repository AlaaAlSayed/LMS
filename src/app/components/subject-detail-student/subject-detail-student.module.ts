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
enableProdMode();

const routes: Routes = [
  {path:'assignment',component:AssignmentComponent},
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
    MainSubjectComponent
  ],
  imports: [
    
    CommonModule,RouterModule.forChild(routes),HttpClientModule
    
  ]
})
export class SubjectDetailStudentModule { }
