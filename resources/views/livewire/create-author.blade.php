<div class="w-72 mx-auto mt-10">
    <form wire:submit="save" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <x-wire-input model="form.name" type="text" name="name" label="Name"/>
        @error('form.name')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <x-wire-input model="form.description" type="textarea" name="description" label="Description"/>
        @error('form.description')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <x-wire-input class="bg-white" model="form.profile_pic_path" type="file" name="profile_pic_path" label="Profile picture"/>
        <p class="text-sm italic dark:text-white">Current image: {{ $form->profile_pic_path ? basename($form->profile_pic_path) : 'none' }}</p>
        @error('form.profile_pic_path')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <button wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="w-full my-2 rounded-md py-1 px-3 bg-customprimary hover:bg-gray-500 dark:bg-blue-500 dark:hover:bg-blue-300 text-white">{{ $author ? 'Update' : 'Create' }}</button>
    </form>
</div>
