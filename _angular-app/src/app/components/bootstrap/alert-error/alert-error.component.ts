import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'alert-error',
  templateUrl: './alert-error.component.html',
  styleUrls: ['./alert-error.component.css']
})
export class AlertErrorComponent implements OnInit {

  constructor() { }

  protected _show = false;

  @Input() set show(value) {
    this._show = value;
    this.showChange.emit(value);
  }

  @Output() showChange: EventEmitter<boolean> = new EventEmitter<boolean>();

  ngOnInit() { }

  hide() {
    this.show = false;
  }

}
