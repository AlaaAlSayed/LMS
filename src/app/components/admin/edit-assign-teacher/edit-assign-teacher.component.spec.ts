import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditAssignTeacherComponent } from './edit-assign-teacher.component';

describe('EditAssignTeacherComponent', () => {
  let component: EditAssignTeacherComponent;
  let fixture: ComponentFixture<EditAssignTeacherComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditAssignTeacherComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditAssignTeacherComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
