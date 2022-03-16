import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailofuplodComponent } from './detailofuplod.component';

describe('DetailofuplodComponent', () => {
  let component: DetailofuplodComponent;
  let fixture: ComponentFixture<DetailofuplodComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailofuplodComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailofuplodComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
