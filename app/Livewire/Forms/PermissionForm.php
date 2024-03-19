<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Form
{
    public ?Permission $permission;

    #[Validate('required')]
    public $name = '';

    public function set(Permission $role) {
        $this->permission = $role;
        $this->name = $role->name;
    }

    public function store() {
        $this->validate();

        Permission::create($this->all());
        $this->reset();
    }

    public function update() {
        $this->validate();

        $this->permission->update($this->all());

        $this->reset();
    }
}
