@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    @php
        $classes = 'border border-gray-400 p-2 w-full';

        if ($type == 'file') {
            $classes .= ' text-green-100';
        } else {
            $classes .= ' text-green-700';
        }

    @endphp
    <input class="{{ $classes }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        value="{{ old($name) }}" required>

    <x-form.error name="{{ $name }}" />
</x-form.field>
