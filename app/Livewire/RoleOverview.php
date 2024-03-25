<?php

namespace App\Livewire;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleOverview extends Component
{

    public ?Role $selectedRole = null;
    public ?Permission $selectedPermission = null;

    public RoleForm $roleForm;

    public function mount($role) {
        if(!$role) return;
        $this->selectedRole = $role;
        $this->roleForm->set($role);
    }

    public function setRole(Role $role) {
        $this->selectedRole = $role;
        $this->roleForm->set($role);

    }

    public function setPermission(Permission $permission) {
        $this->selectedPermission = $permission;
    }


    public function render()
    {
        $roles = Role::all();
        $permissions = [];
        if($this->selectedRole) $permissions = $this->selectedRole->permissions;
        return view('livewire.role-overview', ['roles' => $roles, 'permissions' => $permissions]);
    }
}
