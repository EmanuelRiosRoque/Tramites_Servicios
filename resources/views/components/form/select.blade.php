@props([
    'label' => '',
    'name' => null,
    'options' => [],
    'placeholder' => 'Selecciona una opción',
    'selected' => auth()->check() ? auth()->user()->area_id : '',
    'disable' => false, 
])

@php
    $errorKey = $name ? str_replace(['[', ']'], ['.', ''], $name) : null;
@endphp

<div class="mb-4">
    @if ($label)
        <label @if ($name) for="{{ $name }}" @endif class="block text-sm font-semibold text-gray-800 mb-1">
            {{ $label }}
        </label>
    @endif

    {{-- Campo oculto para enviar el valor si está deshabilitado --}}
    @if ($disable)
        <input type="hidden" name="{{ $name }}" value="{{ $selected }}">
    @endif

    <select
        @if ($name) id="{{ $name }}" name="{{ $name }}" @endif
        @if ($disable) disabled aria-disabled="true" @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border bg-white p-3 text-sm text-gray-800 shadow-sm focus:ring-teal-500 transition duration-150 ease-in-out ' .
                       ($name && $errors->has($errorKey) ? 'border-red-500' : 'border-gray-200')
        ]) }}
    >
        <option disabled value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ (string) $key === (string) $selected ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @if ($name)
        @error($errorKey)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endif
</div>
