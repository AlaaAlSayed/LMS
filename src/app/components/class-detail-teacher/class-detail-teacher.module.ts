import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes} from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { TechmatrialComponent } from './techmatrial/techmatrial.component';
import { TechassignmentComponent } from './techassignment/techassignment.component';
import { TechquizComponent } from './techquiz/techquiz.component';
import { TechsubjectmainComponent } from './techsubjectmain/techsubjectmain.component';
import { CreateMatrialComponent } from './create-matrial/create-matrial.component';
import { CreateAssignmentComponent } from './create-assignment/create-assignment.component';

const routes: Routes = [
  {path:'assignment',component:TechassignmentComponent},
  {path:'quiz',component:TechquizComponent},
  {path:'matrial',component:TechmatrialComponent},
  {path:'',component:TechsubjectmainComponent},
  {path:'creatematrial',component:CreateMatrialComponent},

];

@NgModule({
  declarations: [
    TechmatrialComponent,
    TechassignmentComponent,
    TechquizComponent,
    TechsubjectmainComponent,
    CreateMatrialComponent,
    CreateAssignmentComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),HttpClientModule
  ]
})
export class ClassDetailTeacherModule { }




