import { TestBed, inject } from '@angular/core/testing';

import { ContractServiceService } from './contract-service.service';

describe('ContractServiceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ContractServiceService]
    });
  });

  it('should be created', inject([ContractServiceService], (service: ContractServiceService) => {
    expect(service).toBeTruthy();
  }));
});
