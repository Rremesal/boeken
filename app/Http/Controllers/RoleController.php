<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::with('permissions')->get();
        return view('role.index', ['roles' => $roles]);
    }

    public function edit(Role $role) {
        $roles = Role::with('permissions')->get();
        return view('role.index', ['roles' => $roles, 'editRole' => $role]);
    }

    public function destroy(Role $role) {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
