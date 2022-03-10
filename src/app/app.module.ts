import { PusherService } from './services/pusher.service';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { TokenInterceptor } from './token.interceptor';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NavbarComponent } from './components/navbar/navbar.component';
import { LayoutComponent } from './components/layout/layout.component';
// import { FooterComponent } from './components/footer/footer.component';
import { AdminDashboardComponent } from './components/admin-dashboard/admin-dashboard.component';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { MessagesComponent } from './components/messages/messages.component';
// import { AdminDashboardComponent } from './components/admin/admin-dashboard/admin-dashboard.component';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    LayoutComponent,
    AdminDashboardComponent,
    MessagesComponent,
    // AdminDashboardComponent,
    // FooterComponent,
   
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    HttpClientModule
  ],
  providers: [PusherService,
    {
    provide: HTTP_INTERCEPTORS,
    useClass: TokenInterceptor,
    multi: true
  }],
  bootstrap: [AppComponent]
})
export class AppModule { }
