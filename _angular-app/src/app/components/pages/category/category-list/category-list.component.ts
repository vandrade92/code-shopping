import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-category-list',
  templateUrl: './category-list.component.html',
  styleUrls: ['./category-list.component.css']
})
export class CategoryListComponent implements OnInit {

  categories = [];

  constructor(private http: HttpClient) {

  }

  ngOnInit() {
    console.log('ngOnInit');
    this.http.get<Array<any>>('http://localhost:8000/api/categories', {
            headers: {
              Authorization: `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1NzkyNzc5NywiZXhwIjoxNTU3OTMxMzk3LCJuYmYiOjE1NTc5Mjc3OTcsImp0aSI6IjhHMUFzUW9pR25SOGlzd2IiLCJzdWIiOjEsInBydiI6IjBkZjM4NTQ4ZDU1YmE1ZDMyNTE5ZDgxOGUwZDlhMWU4Y2NkYjVhOGMiLCJlbWFpbCI6ImFkbWluQHVzZXIuY29tIiwibmFtZSI6Ik1yLiBDYXNleSBTcG9yZXIgViJ9.KBt7BEFpi6KY_Ue-o7X9zOOaFsLyO3fqz82giWkEdiw`
            }
          })
              .subscribe(data => this.categories = data);
  }

}
