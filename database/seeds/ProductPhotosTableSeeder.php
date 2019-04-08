<?php

use Illuminate\Database\Seeder;
use CodeShopping\Models\Product;
use CodeShopping\Models\ProductPhoto;

class ProductPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $this->deleteAllPhotosInProductsPath();
        $products->each(function($product){

        });

    }

    private function deleteAllPhotosInProductsPath(){
         $path = ProductPhoto::PRODUCT_PATCH;
         \File::deleteDirectory(storage_path($path), true);
    }
}
