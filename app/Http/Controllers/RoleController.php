<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get(); // Eager load permissions
        return view('users.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all(); // Get all permissions
        return view('users.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'array', // Ensure permissions input is an array
            'permissions.*' => 'exists:permissions,id' // Validate each permission ID exists
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions); // Assign permissions
        }

        return redirect()->route('roles.index')->with('message', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all(); // Get all permissions
        $rolePermissions = $role->permissions->pluck('id')->toArray(); // Get assigned permissions

        return view('users.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions); // Update permissions
        } else {
            $role->permissions()->detach(); // Remove all permissions if none selected
        }

        return redirect()->route('roles.index')->with('message', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach(); // Remove associated permissions before deleting
        $role->delete();

        return redirect()->route('roles.index')->with('message', 'Role deleted successfully');
    }
}
