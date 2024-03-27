<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionOverview extends Component
{

    public string $search = '';

    public function render()
    {
        $roles = Role::all();
        $permissions = Permission::where('name', 'LIKE', '%'.$this->search.'%')->get();
        return view('livewire.permission-overview', ['permissions' => $permissions, 'roles' => $roles]);
    }
}
