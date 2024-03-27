<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view('permission.index', ['permissions' => $permissions]);
    }

    public function edit(Permission $permission) {
        return view('permission.index', ['editPermission' => $permission]);
    }

    public function destroy(Permission $permission) {
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
