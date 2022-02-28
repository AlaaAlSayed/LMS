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
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { UpdatematerialComponent } from './updatematerial/updatematerial.component';
import { UpdateassignmentComponent } from './updateassignment/updateassignment.component';

const routes: Routes = [
  {path:'assignment',component:TechassignmentComponent},
  {path:'quiz',component:TechquizComponent},
  {path:'matrial',component:TechmatrialComponent},
  {path:'',component:TechsubjectmainComponent},
  {path:'creatematrial',component:CreateMatrialComponent},
  {path:'createassignment',component:CreateAssignmentComponent},
  {path:'updateassignment/:assignmentid',component:UpdateassignmentComponent},
  {path:'updatematrial/:matrialid',component:UpdatematerialComponent},


];

@NgModule({
  declarations: [
    TechmatrialComponent,
    TechassignmentComponent,
    TechquizComponent,
    TechsubjectmainComponent,
    CreateMatrialComponent,
    CreateAssignmentComponent,
    UpdatematerialComponent,
    UpdateassignmentComponent
  ],
  imports: [
    CommonModule,RouterModule.forChild(routes),HttpClientModule,ReactiveFormsModule,FormsModule
  ]
})
export class ClassDetailTeacherModule { }




