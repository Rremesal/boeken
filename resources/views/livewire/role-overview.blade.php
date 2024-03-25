@props(['editRole' => null])
<div>
    <section class="grid grid-cols-3">
        <article class="mx-4">
            <header class=" text-2xl font-bold">Roles</header>
            <main class="grid grid-cols-1">
                @foreach ($roles as $role)
                    <span class="ml-2 hover:text-blue-300 hover:cursor-pointer hover:underline {{ $selectedRole ? ($selectedRole->id === $role->id ? 'text-blue-400 underline' : '') : '' }}"   wire:click="setRole({{ $role }})">{{ $role->name }}</span>
                @endforeach
            </main>
        </article>
        <article>
            <header class="text-2xl font-bold">Permissions</header>
            <main>
                @if ($permissions)
                    @foreach ($permissions as $permission)
                        <span class="ml-2">{{ $permission->name }}</span>
                    @endforeach
                @else
                    <span class="ml-2 ">No permissions found</span>
                @endif
            </main>
        </article>
        <article>
            <livewire:create-role :role="$selectedRole"/>
        </article>
    </section>

</div>
