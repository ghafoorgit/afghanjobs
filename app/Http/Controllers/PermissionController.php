<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('users.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('users.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        Permission::create($request->all());
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('users.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update($request->all());
        return redirect()->route('users.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('users.permissions.index');
    }
}
