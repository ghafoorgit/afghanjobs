<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
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
        $validated = $request->validate([
            'name' => 'required|unique:permissions'
        ]);

        Permission::create($validated);
        return redirect()->route('permissions.index')->with('message','The permission created successfully!');
    }

    public function edit(Permission $permission)
    {
        return view('users.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        $permission->update($validated);
        return redirect()->route('permissions.index')->with('message','The permission updated successfully!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')->with('message','The permission deleted successfully!');
    }
}
