@props([
    'label' => '',
    'name',
    'options' => [],
    'modelo' => 'formData', //   nombre del objeto de Alpine o Livewire (por defecto formData)
])

@php
    $fullModel = $modelo ? "\$wire.{$modelo}.{$name}" : $name;
@endphp

<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-semibold text-gray-800 mb-1">
            {{ $label }}
        </label>
    @endif

    <div 
        class="flex flex-wrap gap-6 p-2 rounded"
        :class="tieneError('{{ $name }}') ? 'border border-red-500' : ''"
    >
        @foreach ($options as $value => $text)
            <label class="inline-flex items-center space-x-2">
                <input 
                    type="radio"
                    value="{{ $value }}"
                    name="{{ $modelo }}[{{ $name }}]"
                    x-model="{{ $fullModel }}"
                    @change="limpiarCampoError('{{ $name }}')" 
                    class="form-radio text-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                />

                <span class="text-gray-700 text-sm">{{ $text }}</span>
            </label>
        @endforeach
    </div>

</div>
