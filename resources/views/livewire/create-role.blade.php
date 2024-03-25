<div>
    <form wire:submit="save" class=" w-60">
        <div class="flex flex-col">
            <x-wire-input live model="form.name" value="{{ $form->name }}" label="Role name" type="text" name="name"/>
                @error('form.name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
        </div>
        <x-button class="h-10">Save</x-button>
    </form>
</div>
