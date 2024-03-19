@props(['class' => null, 'label', 'type', 'name', 'value' => null, 'min' => null, 'max' => null, 'required' => false])
<div class="flex flex-col">
    <label class="text-blue-300 font-bold" for="{{ $name }}">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea {{ $required ? 'required' : '' }} class="{{ $class }}" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>
    @else
        <input {{ $required ? 'required' : '' }} value="{{ $value }}" type="{{ $type }}" name="{{ $name }}" min="{{ $min }}" max="{{ $max }}" class="px-3 py-2 rounded-md border border-1">
    @endif
</div>
