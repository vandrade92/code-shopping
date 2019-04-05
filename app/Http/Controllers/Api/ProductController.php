<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductRequest;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
          $product = Product::paginate(10);
          return ProductResource::collection($product);
    }

    public function store(ProductRequest $request)
    {
         $product = Product::create($request->all());
         $product->refresh();

         return new ProductResource($product);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
       $product->fill($request->all());
       $product->save();

       return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
       $product->delete();

       return response()->json([],204);
    }
}
