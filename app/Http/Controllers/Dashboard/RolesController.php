<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EditRoleRequest;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Role $roles)
    {
        $roles = Role::all();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        Role::create($data);
        return redirect()->route('roles')->with('success', 'Role created successfully');
    }

    public function edit(Role $role, Permission $permission){
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update(EditRoleRequest $request, Role $role){
        $data = $request->validated();
        $role->update($data);
        return redirect()->route('roles')->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('roles')->with('success', 'Role deleted successfully');
    }
}
