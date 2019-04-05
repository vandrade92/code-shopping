<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\CategoryRequest;
use CodeShopping\Models\Category;
use Illuminate\Http\Request;
use CodeShopping\Http\Resources\CategoryResource;


class CategoryController extends Controller
{

    public function index()
    {
         return CategoryResource::collection(Category::all());
    }

    public function store(CategoryRequest $request)
    {
         $category = Category::create($request->all());
         $category->refresh();

         return  new CategoryResource($category);
    }

    public function show(Category $category)
    {
         return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, Category $category)
    {
         $category->fill($request->all());
         $category->save();

         return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
          $category->delete();

          return response()->json([],204);
          //HTTP de status de sucesso 204 No Content indica
          //que a solicitação foi bem sucedida e o cliente
          //não precisa sair da página atual.
    }
}
