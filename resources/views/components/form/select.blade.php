@props([
    'label' => '',
    'name' => null,
    'options' => [],
    'placeholder' => 'Selecciona una opción',
    'modelo' => 'formData',
])

@php
    $fullModel = $name ? ($modelo ? "{$modelo}.{$name}" : $name) : null;
    $errorKey = $name ? str_replace(['[', ']'], ['.', ''], $name) : null;
@endphp

<div class="mb-4" x-data>
    @if ($label)
        <label @if ($name) for="{{ $name }}" @endif class="block text-sm font-semibold text-gray-800 mb-1">
            {{ $label }}
        </label>
    @endif

    <select
        @if ($name) id="{{ $name }}" name="{{ $modelo }}[{{ $name }}]" @endif
        @if ($fullModel) x-model="{{ $fullModel }}" @endif
        @change="limpiarCampoError('{{ $name }}')"
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border bg-white p-3 text-sm text-gray-800 shadow-sm focus:ring-teal-500 transition duration-150 ease-in-out ' .
                       ($name && $errors->has($modelo . '.' . $errorKey) ? 'border-red-500' : 'border-gray-200')
        ]) }}
        :class="tieneError('{{ $name }}') ? 'border-red-500' : ''"
    >
        <option disabled value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>

    @if ($name)
        @error($modelo . '.' . $errorKey)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endif
</div>
