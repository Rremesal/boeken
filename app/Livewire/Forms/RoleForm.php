<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public ?Role $role = null;

    #[Validate('required')]
    public $name = '';

    public function set(Role $role) {
        $this->role = $role;
        $this->name = $role->name;
    }

    public function save() {
        if($this->role) {
            $this->update();
        } else {
            $this->store();
        }
    }

    private function store() {
        Role::create($this->validate());
        $this->reset();
    }

    private function update() {
        $this->role->update($this->validate());
        $this->reset();
    }
}
