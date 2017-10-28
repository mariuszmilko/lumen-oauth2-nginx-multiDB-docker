import { Component, Input, OnInit } from '@angular/core';
import { Contract } from './Contract';


@Component({
  selector: 'app-contract-component',
  templateUrl: './contract-component.component.html',
  styleUrls: ['./contract-component.component.css']
})
export class ContractComponentComponent implements OnInit {

  @Input() contract: Contract;

  ngOnInit() {

  }
}
