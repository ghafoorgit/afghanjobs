<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $roles = Role::all(); // Eager load permissions
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
            // 'permissions.*' => 'exists:permissions,id'
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions); // Assign permissions
        }

        return redirect()->route('roles.index')->with('message', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all(); // Get all permissions
        return view('users.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
            // 'permissions.*' => 'exists:permissions,id'
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);


        return redirect()->route('roles.index')->with('message', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {

        $role->delete();

        return redirect()->route('roles.index')->with('message', 'Role deleted successfully');
    }
}
