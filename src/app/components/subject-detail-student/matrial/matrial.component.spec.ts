import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MatrialComponent } from './matrial.component';

describe('MatrialComponent', () => {
  let component: MatrialComponent;
  let fixture: ComponentFixture<MatrialComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MatrialComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MatrialComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
