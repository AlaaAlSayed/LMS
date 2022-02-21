import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TechsubjectmainComponent } from './techsubjectmain.component';

describe('TechsubjectmainComponent', () => {
  let component: TechsubjectmainComponent;
  let fixture: ComponentFixture<TechsubjectmainComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TechsubjectmainComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TechsubjectmainComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
