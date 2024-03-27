<?php

namespace App\Livewire;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public RoleForm $form;

    public function mount($role) {
        if(!$role) return;
        $this->form->set($role);
    }

    public function save() {
        $this->form->save();
        return redirect('/roles');
    }


    public function render()
    {
        return view('livewire.create-role');
    }
}
