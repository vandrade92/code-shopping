<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\CategoryRequest;
use CodeShopping\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
         return Category::all();
    }

    public function store(CategoryRequest $request)
    {
         $category = Category::create($request->all() + ['slug' => 'teste']);
         $category->refresh();

         return $category;
    }

    public function show(Category $category)
    {
         return $category;
    }

    public function update(CategoryRequest $request, Category $category)
    {
         $category->fill($request->all());
         $category->save();

         return $category;
         //return response([],204);
    }

    public function destroy(Category $category)
    {
          $category->delete();

          return response([],204);
          //HTTP de status de sucesso 204 No Content indica
          //que a solicitação foi bem sucedida e o cliente
          //não precisa sair da página atual.
    }
}
