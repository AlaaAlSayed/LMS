import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DoexaamComponent } from './doexaam.component';

describe('DoexaamComponent', () => {
  let component: DoexaamComponent;
  let fixture: ComponentFixture<DoexaamComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DoexaamComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DoexaamComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
