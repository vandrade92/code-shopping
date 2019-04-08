<?php

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
     const BASE_PATCH = 'app/public';
     const DIR_PRODUCTS = 'products';
     const PRODUCT_PATCH = self::BASE_PATCH . '/' . self::DIR_PRODUCTS;

     protected $fillable =['file_name', 'product_id'];
}
