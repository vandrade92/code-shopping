<?php
declare(strict_types=1);

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
     use Sluggable;

     protected $fillable = ['name', 'description', 'price', 'slug'];

     public function sluggable(): array
    {
         return [
              'slug'=> [
                    'source' => 'name'
              ]
         ];
    }
}
