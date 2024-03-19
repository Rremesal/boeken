<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    public $selectedRole = null;
    public $selectedPermission = null;
    public $permissions;


    //ROLES
    public function handleRole(Role $role) {
        if($role->exists) {
            $this->selectedRole = $role;
        } else {
            $this->selectedRole = null;
        }

        $this->dispatch('newRoleSelected', $this->selectedRole);
    }

    public function saveRole() {
        if(!$this->selectedRole) {
            $role = Role::create([
                'name' => $this->roleName
            ]);
            $this->selectedRole = $role;
        } else {
            $this->selectedRole->update([
                'name' => $this->roleName
            ]);
        }

        $this->render();
    }

    public function deleteRole(Role $role) {
        $role->delete();
        return redirect('/role');
    }

    // PERMISSIONS
    public function handlePermission(Permission $permission) {
        $this->selectedPermission = $permission;

        $this->dispatch('permissionSelected', $this->selectedPermission);
    }

    public function savePermission() {
        if(!$this->selectedPermission) {
            $permission = Permission::create([
                'name' => $this->permissionName
            ]);

            $permission->assignRole($this->selectedRole);
        } else {
            $this->selectedPermission->update([
                'name' => $this->permissionName
            ]);
        }

        $this->selectedPermission = $permission;

        $this->render();
    }



    public function deletePermission(Permission $permission) {
        $permission->delete();

        return redirect('/role');
    }


    public function render()
    {
        $roles = Role::all();
        if($this->selectedRole) {
            $this->permissions = $this->selectedRole->permissions;
        } else {
            $this->permissions = [];
        }
        return view('livewire.role-component', ['roles' => $roles, 'permissions' => $this->permissions]);
    }
}
