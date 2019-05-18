import { HttpClient } from '@angular/common/http';
import { Component, OnInit, ViewChild } from '@angular/core';
import { ModalComponent } from './../../../bootstrap/modal/modal.component';

@Component({
// tslint:disable-next-line: component-selector
  selector: 'category-new-modal',
  templateUrl: './category-new-modal.component.html',
  styleUrls: ['./category-new-modal.component.css']
})
export class CategoryNewModalComponent implements OnInit {

  category = {
    name: '',
  };

  @ViewChild(ModalComponent)
  modal: ModalComponent;

  constructor(private http: HttpClient) { }

  ngOnInit() {
  }

  submit() {
    console.log('entrou no metodo');
    const token = window.localStorage.getItem('token');
    this.http
            .post('http://localhost:8000/api/categories', this.category, {
              headers: {
                  Authorization: `Bearer ${token}`
              }
            })
            .subscribe((category) => {
              console.log(category);
              this.modal.hide();
              // this.getCategories();
            });
  }

  showModal() {
    this.modal.show();
  }

  hideModal($event: Event) {
    console.log($event);
  }

}
