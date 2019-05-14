import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  email = 'admin@user.com';
  obj = {
    email: 'outroemail.com',
     array: [1]
  };

  //simbolo [] - o TS reflete alterações no template --- Dados ----> template
  constructor() { }

  ngOnInit() {

    setTimeout( ()=> {
      this.email = 'qualquer coisa';
    }, 3000)
  }

}
