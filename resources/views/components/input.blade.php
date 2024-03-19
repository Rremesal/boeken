@props(['class' => null, 'label', 'type', 'name', 'value' => null])
<div>
    <label class="text-blue-300 font-bold" for="{{ $name }}">{{ $label }}</label>
    <input value="{{ $value }}" type="{{ $type }}" name="{{ $name }}" class="px-3 py-2 rounded-md border border-1">
</div>
