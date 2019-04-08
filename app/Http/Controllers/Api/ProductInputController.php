<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Models\ProductInput;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\ProductInputResource;

class ProductInputController extends Controller
{

    public function index()
    {
          $inputs = ProductInput::paginate();
          return ProductInputResource::collection($inputs);
    }

   public function store(Request $request)
    {
        //
    }

    public function show(ProductInput $productInput)
    {
        //
    }

}
