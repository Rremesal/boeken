<?php

namespace App\Livewire\Forms;

use Illuminate\Routing\RedirectController;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionForm extends Form
{
    public ?Permission $permission = null;

    #[Validate('required')]
    public $name = '';

    public $role = null;

    public function set(Permission $permission) {
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    public function save() {
        if($this->role) {
            $this->role = Role::where('id', $this->role)->get()[0];
        }
        if($this->permission) {
            $this->update($this->role);
        } else {
            $this->store($this->role);
        }
    }

    private function store(?Role $role) {
        $permission = Permission::create($this->validate());
        if($this->role)  $role->givePermissionTo($permission->name);

        $this->reset();
    }

    private function update(?Role $role) {
        if(!$this->role) {
            $associated_role = $this->permission->roles[0];
            $associated_role->revokePermissionTo($this->permission);

            return redirect('/permissions');
        }

        if(!$role->hasPermissionTo($this->permission)) {
            $role->givePermissionTo($this->permission);
        }
        $this->permission->update($this->validate());
        $this->reset();
    }

}
