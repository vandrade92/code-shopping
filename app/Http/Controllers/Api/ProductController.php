<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductRequest;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {
          $query = Product::query();
          $products = $query->paginate(10);
          return ProductResource::collection($products);
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
