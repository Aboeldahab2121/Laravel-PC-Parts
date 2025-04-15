<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchUserRequest;
use App\Http\Requests\PostUserRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(PostUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        return response()->json($user , Response::HTTP_CREATED);
    }

    public function update(PatchUserRequest $request , User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(Response::HTTP_NO_CONTENT);
    }
}
