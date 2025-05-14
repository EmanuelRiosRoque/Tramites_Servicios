@props([
    'label' => '',
    'name' => null,
    'options' => [],
    'placeholder' => 'Selecciona una opción',
    'selected' => auth()->check() ? auth()->user()->area_id : '',
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

    <select
        @if ($name) id="{{ $name }}" name="{{ $name }}" @endif
        @if ($name === 'area_id' && !empty($selected) && !auth()->user()->hasRole('Administrador')) disabled @endif
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border bg-white p-3 text-sm text-gray-800 shadow-sm focus:ring-teal-500 transition duration-150 ease-in-out ' .
                       ($name && $errors->has($name) ? 'border-red-500' : 'border-gray-200')
        ]) }}
    >
        <option disabled value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @if ($name)
        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endif
</div>
