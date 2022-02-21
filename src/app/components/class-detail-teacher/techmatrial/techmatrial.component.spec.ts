import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TechmatrialComponent } from './techmatrial.component';

describe('TechmatrialComponent', () => {
  let component: TechmatrialComponent;
  let fixture: ComponentFixture<TechmatrialComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TechmatrialComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TechmatrialComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
