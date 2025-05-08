@props([
    'label' => '',
    'name' => null,
    'type' => 'text',
    'placeholder' => '',
    'tooltip' => '',
    'modelo' => 'formData',
])

@php
    $fullModel = $name ? ($modelo ? "{$modelo}.{$name}" : $name) : null;
    $errorKey = $name ? str_replace(['[', ']'], ['.', ''], $name) : null;
@endphp

<div class="mb-4">
    @if ($label)
        <label @if($name) for="{{ $name }}" @endif class="block text-sm font-semibold text-gray-800 mb-1">
            {{ $label }}
        </label>
    @endif

    @if ($tooltip)
        <span class="text-sm text-gray-600 block mb-1">{{ $tooltip }}</span>
    @endif

    <input
        type="{{ $type }}"
        @if ($name) id="{{ $name }}" name="{{ $modelo }}[{{ $name }}]" @endif
        @if ($fullModel) x-model="{{ $fullModel }}" @endif
        @input="limpiarCampoError('{{ $name }}')"
        placeholder="{{ $placeholder ?: $label }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-md border bg-white p-3 text-sm text-gray-800 placeholder-gray-400 shadow-sm focus:ring-teal-500 transition duration-150 ease-in-out ' .
                       ($name && $errors->has($modelo . '.' . $errorKey) ? 'border-red-500' : 'border-gray-200')
        ]) }}
        :class="tieneError('{{ $name }}') ? 'border-red-500' : ''"
    />

    @if ($name)
        @error($modelo . '.' . $errorKey)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endif
</div>
