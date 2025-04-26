<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchUserRequest;
use App\Http\Requests\PostUserRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

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
        $userData = $request->validated();
        $user = $this->userService->createUser($userData);

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function update(PatchUserRequest $request, User $user)
    {
        $userData = $request->validated();
        $user = $this->userService->updateUser($userData, $user);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $this->userService->destroyUser($user);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
