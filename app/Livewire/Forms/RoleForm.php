<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public ?Role $role;

    #[Validate('required')]
    public $name = '';


    public function set(Role $role) {
        $this->role = $role;
        $this->name = $role->exists ? $role->name : '';
    }

    public function store() {
        $this->validate();

        Role::create($this->all());
        $this->reset();
    }

    public function update() {
        $this->validate();

        $this->role->update($this->all());

        $this->reset();
    }
}
