<?php

namespace App\Livewire;

use App\Livewire\Forms\PermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreatePermission extends Component
{
    public PermissionForm $form;

    public function mount($permission) {
        if(!$permission) return;
        $this->form->set($permission);
    }

    public function save() {
        $this->form->save();
        return redirect('/permissions');
    }


    public function render()
    {
        $roles = Role::all();
        return view('livewire.create-permission', ['roles' => $roles]);
    }
}
