<aside class="w-full sm:w-80 bg-white border-r border-gray-200 px-6 py-5 rounded-l-xl shadow-xl">
    <ul class="space-y-4 text-[15px] text-cyan-600 font-medium">
        @foreach([
            ['id' => 'datos', 'icon' => 'folder', 'label' => 'Datos del trámite o servicio'],
            ['id' => 'pasos', 'icon' => 'list', 'label' => 'Pasos'],
            ['id' => 'requisitos', 'icon' => 'list-check', 'label' => 'Requisitos'],
            ['id' => 'documentos', 'icon' => 'file', 'label' => 'Documentos requeridos'],
            ['id' => 'formatos', 'icon' => 'book', 'label' => 'Formatos'],
            ['id' => 'verificacion', 'icon' => 'search', 'label' => 'Inspección Verificación'],
            ['id' => 'plazo', 'icon' => 'hourglass', 'label' => 'Plazo'],
            ['id' => 'monto', 'icon' => 'banknote', 'label' => 'Monto'],
            ['id' => 'vigencia', 'icon' => 'calendar', 'label' => 'Vigencia'],
            ['id' => 'criterio', 'icon' => 'sliders-horizontal', 'label' => 'Criterio'],
            ['id' => 'unidad', 'icon' => 'map-pin', 'label' => 'Unidad Administrativa, Domicilio y Horario'],
            ['id' => 'otrosMedios', 'icon' => 'wifi', 'label' => 'Datos relativos a cualquier otro medio'],
            ['id' => 'informacion', 'icon' => 'info', 'label' => 'Información'],
            ['id' => 'estrategia', 'icon' => 'lightbulb', 'label' => 'Demás información que se prevea en la estrategia'],
        ] as $item)
        <li 
        class="p-1 border-b"
        :class="tabsConError.includes('{{ $item['id'] }}') ? 'bg-red-100' : ''"
    >
        <a href="#"
           @click.prevent="cambiarTab('{{ $item['id'] }}')"
           class="flex items-center justify-between"
           :class="tab === '{{ $item['id'] }}' ? 'font-bold text-teal-700' : 'hover:text-teal-700'"
        >
            <span class="flex items-center gap-3">
                <!-- Ícono dinámico -->
                <template x-if="tabsConError.includes('{{ $item['id'] }}')">
                    <x-lucide-alert-circle class="w-5 h-5 text-red-400" />
                </template>
                <template x-if="!tabsConError.includes('{{ $item['id'] }}')">
                    <x-dynamic-component :component="'lucide-' . $item['icon']" class="w-5 h-5 text-cyan-500" />
                </template>
    
                <!-- Texto del tab -->
                {{ $item['label'] }}
            </span>
    
            <!-- Flechita final -->
            <x-lucide-arrow-right class="w-5 h-5 text-cyan-500" />
        </a>
    </li>
    
        @endforeach
    </ul>
</aside>
