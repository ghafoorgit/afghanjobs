<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get(); // Eager load roles
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Get all roles
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'roles' => 'array', // Ensure roles input is an array
            'roles.*' => 'exists:roles,id' // Validate each role ID exists
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles); // Assign roles
        }

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles
        $userRoles = $user->roles->pluck('id')->toArray(); // Get assigned roles

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'array',
            'roles.*' => 'exists:roles,id'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles); // Update roles
        } else {
            $user->roles()->detach(); // Remove all roles if none selected
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach(); // Remove associated roles before deleting
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
