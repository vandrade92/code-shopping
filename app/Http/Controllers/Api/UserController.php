<?php

namespace CodeShopping\Http\Controllers\Api;

use Illuminate\Http\Request;
use CodeShopping\Http\Resources\UserResource;
use CodeShopping\Models\User;
use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\UserRequest;
use CodeShopping\Common\OnlyTrashed;


class UserController extends Controller
{
     use OnlyTrashed;

     public function index(Request $request)
     {
          $query = User::query();
          $query = $this->onlyTrashedIfRequested($request,$query);
          $users = $query->paginate(10);

          return UserResource::collection($users);
     }

     public function store(UserRequest $request)
     {
          $user = User::create($request->all());
          return new UserResource($user);

     }

     public function show(User $user)
     {
          return new UserResource($user);
     }

     public function update(UserRequest $request, User $user)
     {
          $user->fill($request->all());
          $user->save();
          return new UserResource($user);
     }

     public function destroy(User $user)
     {
          $user->delete();
          return response()->json([],204);
     }
}
