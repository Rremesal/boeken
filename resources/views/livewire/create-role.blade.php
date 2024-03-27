<div class="mx-auto">
    <form class="flex" wire:submit="save" class=" w-60">
        <div class="flex flex-col">
            <x-wire-input live model="form.name" value="{{ $form->name }}" type="text" name="name"/>
                @error('form.name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
        </div>
        <x-button class="mx-1">Save</x-button>
        <x-button><a class="h-full w-full" href="{{ route('roles.index') }}">New Role</a></x-button>
    </form>
    <div><a class="text-blue-300 hover:underline hover:text-blue-200" href="{{ route('permissions.index') }}">Go to permissions</a></div>
</div>
