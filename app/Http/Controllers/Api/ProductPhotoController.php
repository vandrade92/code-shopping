<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Models\ProductPhoto;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductPhotoResource;
use CodeShopping\Http\Resources\ProductPhotoCollection;
use CodeShopping\Http\Requests\ProductPhotoRequest;

class ProductPhotoController extends Controller
{

    public function index(Product $product)
    {
        return new ProductPhotoCollection($product->photos, $product);
    }

    public function store(ProductPhotoRequest $request, Product $product)
    {
         $photos = ProductPhoto::createWithPhotosFiles($product->id, $request->photos);
         return response()->json(new ProductPhotoCollection($photos,$product),201);
    }

    public function show(Product $product, ProductPhoto $photo)
    {
        $this->assertProductPhoto($photo, $product);
        return new ProductPhotoResource($photo);
    }

    public function update(Request $request, Product $product, ProductPhoto $photo)
    {
         $this->assertProductPhoto($photo, $product);
         $photo = $photo->updateWithPhoto($request->photo);
         return new ProductPhotoResource($photo);

    }

    private function assertProductPhoto(ProductPhoto $photo, Product $product)
    {
         if($product->id != $photo->product_id)
         {
              abort(404);
         };
    }

    public function destroy(Product $product, $productPhotoId)
    {
        $productPhoto = ProductPhoto::find($productPhotoId);
        $productPhoto->deletePhoto($productPhoto->file_name);
        $productPhoto->delete();
        return response()->json([],204);
    }
}
