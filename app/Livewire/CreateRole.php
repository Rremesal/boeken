<?php

namespace App\Livewire;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public RoleForm $form;


    protected $listeners = ['newRoleSelected' => 'set'];


    public function mount(Role $role) {
        $this->form->set($role);
    }

    public function set(Role $role) {
        $this->form->set($role);
    }

    public function save() {
        if($this->form->role) {
            $this->form->role->update();
        } else {
            $this->form->store();
        }


        return redirect('/role');
    }


    public function render()
    {
        return view('livewire.create-role');
    }
}
