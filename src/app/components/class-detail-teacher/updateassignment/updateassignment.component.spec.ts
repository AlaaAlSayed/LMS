import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateassignmentComponent } from './updateassignment.component';

describe('UpdateassignmentComponent', () => {
  let component: UpdateassignmentComponent;
  let fixture: ComponentFixture<UpdateassignmentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ UpdateassignmentComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(UpdateassignmentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
