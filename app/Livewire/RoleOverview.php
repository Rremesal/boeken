<?php

namespace App\Livewire;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleOverview extends Component
{
    public string $search = '';

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%'.$this->search.'%')->get();
        return view('livewire.role-overview', ['roles' => $roles]);
    }
}
