<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('permission:manage-users');
    }

    public function index()
    {
        return User::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'array'
        ]);

        $user = User::create($request->only('name', 'email', 'password'));

        if ($request->has('roles')) {
            $roles = Role::whereIn('name', $request->roles)->get();
            $user->syncRoles($roles);
        }

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return $user->load('roles');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
            'roles' => 'array'
        ]);

        $user->update($request->only('name', 'email', 'password'));

        if ($request->has('roles')) {
            $roles = Role::whereIn('name', $request->roles)->get();
            $user->syncRoles($roles);
        }

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
