<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Models\ProductInput;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductInputResource;
use CodeShopping\Http\Requests\ProductInputRequest;

class ProductInputController extends Controller
{

    public function index()
    {
          $inputs = ProductInput::with('product')->paginate();
          return ProductInputResource::collection($inputs);
    }

   public function store(ProductInputRequest $request)
    {
        $input = ProductInput::create($request->all());
        return new ProductInputResource($input);
    }

    public function show(ProductInput $input)
    {
        return new ProductInputResource($input);
    }

}
