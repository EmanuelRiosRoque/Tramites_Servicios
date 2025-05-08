@props([
    'label' => '',
    'name',
    'options' => [],
])

<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-semibold mb-2">{{ $label }}</label>
    @endif
    <div class="flex items-center space-x-6">
        @foreach ($options as $value => $text)
            <label class="inline-flex items-center">
                <input 
                    type="checkbox" 
                    name="{{ $name }}[]" 
                    value="{{ $value }}" 
                    class="form-checkbox text-teal-600"
                    {{ in_array($value, old($name, [])) ? 'checked' : '' }}
                >
                <span class="ml-2">{{ $text }}</span>
            </label>
        @endforeach
    </div>
</div>
