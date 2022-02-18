import { Component, OnInit } from '@angular/core';
// import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-add-student',
  templateUrl: './add-student.component.html',
  styleUrls: ['./add-student.component.css']
})
export class AddStudentComponent implements OnInit {
  // formLogin = new FormGroup({}) 
  constructor() { }
//private _formBuilder:FormBuilder
  ngOnInit(): void {
    // this.formLogin = this._formBuilder.group({
    //   Email:['' , [Validators.required,Validators.maxLength(50),Validators.minLength(10)]],
    //   Password:['',[Validators.required,Validators.minLength(8),Validators.maxLength(20)]],
    //   Phone:['',[Validators.required,Validators.minLength(11),Validators.maxLength(11)]],

    // })
  }

}
