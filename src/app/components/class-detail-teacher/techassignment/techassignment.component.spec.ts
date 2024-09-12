import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TechassignmentComponent } from './techassignment.component';

describe('TechassignmentComponent', () => {
  let component: TechassignmentComponent;
  let fixture: ComponentFixture<TechassignmentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TechassignmentComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TechassignmentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
