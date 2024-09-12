import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TechquizComponent } from './techquiz.component';

describe('TechquizComponent', () => {
  let component: TechquizComponent;
  let fixture: ComponentFixture<TechquizComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TechquizComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TechquizComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
