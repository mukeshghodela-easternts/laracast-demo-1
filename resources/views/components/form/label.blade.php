@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-green-100" for="{{ $name }}">
    {{ ucwords($name) }}
</label>
