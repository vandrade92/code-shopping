<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Models\ProductPhoto;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductPhotoResource;
use CodeShopping\Http\Resources\ProductPhotoCollection;

class ProductPhotoController extends Controller
{

    public function index(Product $product)
    {
        return new ProductPhotoCollection($product->photos, $product);
    }

    public function store(Request $request)
    {

    }

    public function show(Product $product, ProductPhoto $photo)
    {
        if($product->id != $photo->product_id)
        {
             abort(404,'There is no photo for this product');
        };
        return new ProductPhotoResource($photo);
    }

    public function update(Request $request, ProductPhoto $productPhoto)
    {
        //
    }

    public function destroy(ProductPhoto $productPhoto)
    {
        //
    }
}
