import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowassignmentComponent } from './showassignment.component';

describe('ShowassignmentComponent', () => {
  let component: ShowassignmentComponent;
  let fixture: ComponentFixture<ShowassignmentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ShowassignmentComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowassignmentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
