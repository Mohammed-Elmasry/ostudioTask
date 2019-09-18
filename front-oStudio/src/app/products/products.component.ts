import { Component, OnInit } from '@angular/core';
import {Product} from '../Product';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.scss']
})

export class ProductsComponent implements OnInit {
  product: Product = {
    id: 1,
    name: 'ORM',
    description: 'Object relational mapper',
    image: ''
  };


  constructor() { }

  ngOnInit() {
  }

}
