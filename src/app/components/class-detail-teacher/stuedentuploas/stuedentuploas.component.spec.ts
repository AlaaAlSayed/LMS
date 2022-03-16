import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StuedentuploasComponent } from './stuedentuploas.component';

describe('StuedentuploasComponent', () => {
  let component: StuedentuploasComponent;
  let fixture: ComponentFixture<StuedentuploasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ StuedentuploasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(StuedentuploasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
