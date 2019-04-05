<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\ProductRequest;
use CodeShopping\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
          return Product::paginate(10);
    }

    public function store(ProductRequest $request)
    {
         $product = Product::create($request->all());
         $product->refresh();

         return $product;
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
       $product->fill($request->all());
       $product->save();

       return $product;
    }

    public function destroy(Product $product)
    {
       $product->delete();

       return response()->json([],204);
    }
}
