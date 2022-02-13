import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LayoutComponent } from './components/layout/layout.component';


const routes: Routes = [
  {path: 'admin',

  loadChildren: () => import('./components/admin/admin.module').then(m => m.AdminModule)
},
{
  path: 'student', 
 
  loadChildren: () => import('./components/student/student.module').then(m => m.StudentModule)
},
{
  path: 'user', 
 
  loadChildren: () => import('./components/user/user.module').then(m => m.UserModule)
},
{path: 'profile',

component:LayoutComponent,
loadChildren: () => import('./components/profile/profile.module').then(m => m.ProfileModule)
},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
