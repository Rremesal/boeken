@props(['live' => false, 'model', 'class' => null, 'label' => null, 'type', 'name', 'value' => null, 'min' => null, 'max' => null, 'required' => false])
<div class="flex flex-col">
    <label class="dark:text-white" for={{ $name }}>{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea {{ $live ? "wire:model.live=".$model : 'wire:model='.$model }}  {{ $required ? 'required' : '' }} class="{{ $class }}" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>
    @else
    <input {{ $live ? "wire:model.live=".$model : 'wire:model='.$model }}  {{ $required ? 'required' : '' }} value="{{ $value }}" type="{{ $type }}" name="{{ $name }}" min="{{ $min }}" max="{{ $max }}" class="px-3 py-2 rounded-md border border-1 {{ $class }}">
    @endif
</div>
