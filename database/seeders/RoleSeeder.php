<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Steve Rogers',
            'email' => 'steverogers@gmail.com',
            'password' => Hash::make('welkom1')
        ]);

        $role = Role::create([
            'name' => 'admin',
        ]);

        $permission = Permission::create([
            'name' => 'edit pages',
        ]);

        $role->givePermissionTo($permission);
        $user->assignRole($role->name);


        Role::create([
            'name' => 'moderator',
        ]);
    }
}
