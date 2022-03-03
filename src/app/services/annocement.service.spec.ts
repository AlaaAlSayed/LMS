import { TestBed } from '@angular/core/testing';

import { AnnocementService } from './annocement.service';

describe('AnnocementService', () => {
  let service: AnnocementService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(AnnocementService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
