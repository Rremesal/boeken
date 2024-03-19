<section class="lg:grid grid-cols-3">
    <article class=" px-3 py-5">
        <header>
            <h2 class="text-2xl dark:text-white">Roles</h2>
        </header>
        <main class="overflow-y-scroll h-52 md:overflow-auto md:h-full pl-4">
            @foreach ($roles as $role)
                <div>
                    <span wire:click="handleRole({{ $role }})"
                        class=" hover:text-blue-300 {{ $selectedRole && $selectedRole->id === $role->id ? 'text-blue-300' : 'dark:text-white' }} hover:cursor-pointer  underline">{{ $role->name }}</span>
                    <button wire:click="deleteRole({{ $role }})"
                        class="text-red-500 hover:text-red-300">Verwijderen</button>
                </div>
            @endforeach
            <button wire:click="handleRole()" class="text-blue-500 italic">New role</button>
        </main>
    </article>
    <article class="px-3 py-5">
        <header>
            <h2 class="text-2xl dark:text-white">Permissions</h2>
        </header>
        <main class="pl-4">
            @if ($selectedRole)
                @if ($permissions)
                    @foreach ($permissions as $permission)
                        <div>
                            <span wire:click="handlePermission({{ $permission }})"
                                class="hover:text-blue-300 {{ $selectedPermission && $selectedPermission->id === $permission->id ? 'text-blue-300' : 'dark:text-white' }} hover:cursor-pointer underline">{{ $permission->name }}</span>
                            <button wire:click="deletePermission({{ $permission }})"
                                class="text-red-500 hover:text-red-300">Verwijderen</button>
                        </div>
                    @endforeach
                @else
                    <span class="dark:text-white">No permissions found for this role</span>
                @endif
                <button wire:click="setPermissionForm()" class="text-blue-500 italic">New permission</button>
            @else
                <span class="dark:text-white">No role currently selected</span>
            @endif
        </main>
    </article>
    <article class="p-5">
            <main class=" w-72">
                @if($selectedRole)
                    <livewire:create-role :role="$selectedRole->id"/>
                @else
                    <livewire:create-role/>
                @endif
            </main>
        <main class=" w-72">
        </main>
    </article>
</section>
