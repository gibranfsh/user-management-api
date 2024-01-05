<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Get all users.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $page = $request->get('page', 1);
        $size = $request->get('size', 10);

        $users = User::paginate($size, ['*'], 'page', $page);

        if ($users) {
            return response()->json([
                'message' => 'Users successfully retrieved',
                new UserCollection($users)
            ], 200);
        } else {
            return response()->json([
                'message' => 'Users not found',
            ], 404);
        }
    }

    /**
     * Get a user by id.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            return response()->json([
                'message' => 'User successfully retrieved',
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
    }

    /**
     * Update a user by id.
     *
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $data = $request->validated();
        $user->fill($data);
        $user->save();

        if ($user) {
            return response()->json([
                'message' => 'User successfully updated',
                'user' => new UserResource($user)
            ], 200);
        } else {
            return response()->json([
                'message' => 'User update failed',
            ], 400);
        }
    }

    /**
     * Delete a user by id.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User successfully deleted',
        ], 200); // Bisa juga 204 (No Content)
    }
}
