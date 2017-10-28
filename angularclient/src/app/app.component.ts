import { Component } from '@angular/core';
import { Contract } from './contract-component/Contract';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Kontrakty';
  selectedContract: Contract;
  contracts = [
  	new Contract(101, 'forLife'), 
  	new Contract(102, 'forBusiness'), 
  	new Contract(103, 'forCar'), 
  	new Contract(104, 'forLife')
  ];
  contract = this.contracts[0];
  onSelect(contract: Contract): void {
  this.selectedContract = contract;
}
} 


