import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateoptionComponent } from './createoption.component';

describe('CreateoptionComponent', () => {
  let component: CreateoptionComponent;
  let fixture: ComponentFixture<CreateoptionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateoptionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateoptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
