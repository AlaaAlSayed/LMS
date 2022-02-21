import { SubjectService } from './../../../services/subject.service';
import { subject } from 'src/app/models/subject';
import { Component, OnInit, Injectable } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { enableProdMode } from '@angular/core';
@Component({
  selector: 'app-showassignment',
  templateUrl: './showassignment.component.html',
  styleUrls: ['./showassignment.component.css']
})
export class ShowassignmentComponent implements OnInit {

  constructor(private _subjectservice:SubjectService,private _activatedRoute:ActivatedRoute) { }

  ngOnInit(): void {
  }

}
