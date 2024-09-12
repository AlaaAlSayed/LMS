import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MainSubjectComponent } from './main-subject.component';

describe('MainSubjectComponent', () => {
  let component: MainSubjectComponent;
  let fixture: ComponentFixture<MainSubjectComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MainSubjectComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MainSubjectComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
