<div class="mx-auto">
    <form class="flex flex-col gap-2" wire:submit="save" class=" w-60">
        <div class="flex flex-col">
            <x-wire-input class="my-2" live model="form.name" value="{{ $form->name }}" type="text" name="name"/>
                @error('form.name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            <select wire:model.live="form.role" name="" id="">
                <option class="italc" value="{{ null }}">None</option>
                @foreach ($roles as $role)
                    <option {{ $role === $form->role ? 'checked' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <x-button>Save</x-button>
        <x-button><a class="h-full w-full" href="{{ route('permissions.index') }}">New Permission</a></x-button>
        <a class="text-blue-300 hover:underline hover:text-blue-200"  href="{{ route('roles.index') }}">Create a role</a>
    </form>
</div>
