  @props(['name'])

  <x-form.field>
      <x-form.label name="{{ $name }}" />

      <textarea class="text-green-700 border border-gray-200 rounded p-2 w-full" name="{{ $name }}"
          id="{{ $name }}" required>{{ $slot ?? old($name) }}</textarea>

      <x-form.error name="{{ $name }}" />
  </x-form.field>
