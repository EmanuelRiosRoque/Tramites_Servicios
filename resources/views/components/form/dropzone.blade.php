@props([
    'name' => 'files',
    'label' => 'Archivos',
    'accept' => '*',
    'multiple' => true,
])

<div 
    x-data="dropzonePreview('{{ $name }}', {{ $multiple ? 'true' : 'false' }}, '{{ $attributes->whereStartsWith('x-model')->first() }}')"
    x-init="$nextTick(() => init($refs.input))"
    class="space-y-4"
>
    @if ($label)
        <label class="block text-sm font-medium text-gray-800 mb-2">{{ $label }}</label>
    @endif

    <!-- Dropzone Área -->
    <div 
    class="border-2 border-dashed rounded-lg p-6 bg-gray-50 text-center transition cursor-pointer"
    :class="[
        dragging ? 'bg-teal-50 border-teal-400' : '',
        (files.length === 0 && tieneError('{{ $name }}')) ? 'border-red-500' : 'border-gray-300 hover:border-teal-400'
    ]"
    @click.stop="$refs.input.click()"
    @dragover.prevent
    @drop.prevent="handleDrop($event)"
    @dragenter="dragging = true"
    @dragleave="dragging = false"
>



        <p class="text-sm text-gray-600">
            <span class="text-gray-800 font-medium">📁 Suelta aquí</span> o 
            <span class="underline text-teal-600">haz clic para buscar archivos</span>
        </p>
        <p class="text-xs text-gray-400 mt-1">Formatos permitidos: PDF, PNG, JPEG, PPTX • Máx 10MB</p>
        <input 
            type="file"
            {{ $multiple ? 'multiple' : '' }}
            accept="{{ $accept }}"
            class="hidden" 
            x-ref="input" 
            @click.stop 
            @change="handleFileChange"
        />
    </div>

    <!-- Lista de archivos -->
    <template x-if="files.length > 0">
        <div class="space-y-3">
            <template x-for="(file, index) in files" :key="index">
                <div class="flex items-center justify-between bg-white border rounded-md shadow-sm p-3">
                    <div class="flex items-center gap-3">
                        <template x-if="file.type.startsWith('image/')">
                            <img :src="URL.createObjectURL(file)" alt="" class="w-10 h-10 object-cover rounded-md">
                        </template>
                        <template x-if="!file.type.startsWith('image/')">
                            <div class="w-10 h-10 bg-gray-100 flex items-center justify-center rounded-md">📄</div>
                        </template>
                        <div>
                            <p class="text-sm font-medium text-gray-800" x-text="file.name"></p>
                            <p class="text-xs text-gray-500" x-text="(file.size / 1024).toFixed(1) + ' KB'"></p>
                        </div>
                    </div>
                    <button 
                        type="button" 
                        @click.stop="removeFile(index)" 
                        class="p-1 rounded-full hover:bg-red-100"
                    >
                        <x-lucide-x class="w-4 h-4 text-red-500" />
                    </button>
                </div>
            </template>
        </div>
    </template>
</div>
