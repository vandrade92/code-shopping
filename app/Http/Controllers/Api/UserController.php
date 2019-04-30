<?php

namespace CodeShopping\Http\Controllers\Api;

use Illuminate\Http\Request;
use CodeShopping\Http\Resources\UserResource;
use CodeShopping\Models\User;
use CodeShopping\Http\Controllers\Controller;


class UserController extends Controller
{
     public function index()
     {
          $users = User::paginate(10);
          return UserResource::collection($users);
     }

     public function store($request)
     {
          //
     }

     public function show(User $user)
     {
          return new UserResource($user);
     }

     public function update(Request $request, $id)
     {
          //
     }

     public function destroy($id)
     {
          //
     }
}
