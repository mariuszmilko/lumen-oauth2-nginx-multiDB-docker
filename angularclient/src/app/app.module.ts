import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule }   from '@angular/forms'; // <-- NgModel 
import { AppComponent } from './app.component';
import { ContractComponentComponent } from './contract-component/contract-component.component';

@NgModule({
  declarations: [
    AppComponent,
    ContractComponentComponent
  ],
  imports: [
    BrowserModule,
    FormsModule	
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
