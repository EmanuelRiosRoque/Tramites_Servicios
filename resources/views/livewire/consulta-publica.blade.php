<div class="min-h-screen bg-gray-50 text-gray-800 grid grid-cols-1 md:grid-cols-[250px_1fr]">

    <!-- Sidebar -->
        <aside class="bg-white shadow-sm border-r h-screen sticky top-0 hidden md:block px-6 py-8 overflow-y-auto">
            <h2 class="text-teal-600 font-bold text-lg mb-6">Áreas</h2>

            <nav class="space-y-3 text-sm">
                <button wire:click="setOrigen(null)" 
                class="flex items-center gap-2 px-3 py-2 rounded transition 
                    {{ is_null($origen) ? 'bg-teal-100 text-teal-800 font-bold' : 'text-gray-700 hover:text-teal-700' }}">
                ...
                <span>Todo</span>
            </button>

            <button wire:click="setOrigen('1')" 
                class="flex items-center gap-2 px-3 py-2 rounded transition 
                    {{ $origen === '1' ? 'bg-yellow-100 text-yellow-800 font-bold' : 'text-gray-700 hover:text-yellow-600' }}">
                ...
                <span>TSJCDMX</span>
            </button>

            <button wire:click="setOrigen('2')" 
                class="flex items-center gap-2 px-3 py-2 rounded transition 
                    {{ $origen === '2' ? 'bg-purple-100 text-purple-800 font-bold' : 'text-gray-700 hover:text-purple-600' }}">
                ...
                <span>CJCDMX</span>
            </button>

            </nav>
        </aside>

    <!-- Main content -->
    <div class="w-full">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-10 px-6 py-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold text-teal-700">Trámites y Servicios</h1>
                <input 
                    type="text" 
                    wire:model.live="search" 
                    placeholder="Buscar..." 
                    class="w-64 border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-500"
                >
            </div>
        </header>

        <!-- Content -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Tabs -->
            <div class="flex space-x-4 mb-6">
                <button wire:click="setTipo('tramite')"
                    class="px-4 py-2 rounded-md font-semibold transition
                    {{ $tipoActivo === 'tramite' ? 'bg-teal-600 text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-teal-50' }}">
                    Trámites
                </button>
                <button wire:click="setTipo('servicio')"
                    class="px-4 py-2 rounded-md font-semibold transition
                    {{ $tipoActivo === 'servicio' ? 'bg-teal-600 text-white' : 'bg-white border border-gray-300 text-gray-700 hover:bg-teal-50' }}">
                    Servicios
                </button>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($tramites as $tramite)
                    <a href="{{ route('vista.consulta', $tramite->id) }}"
                        class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 transition-transform transform hover:scale-105 hover:shadow-md hover:border-teal-400 group flex flex-col justify-between"
                        >
                        <div class="mb-3">
                            <h2 class="text-lg font-bold text-gray-800 group-hover:text-teal-700">
                                {{ $tramite->nombreTramite }}
                            </h2>
                            <p class="text-sm text-gray-600 mt-1 group-hover:text-teal-600 line-clamp-3">
                                {{ $tramite->descripcionTramite }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between text-sm text-gray-500 mt-3">
                            <span class="inline-flex items-center gap-1">
                                <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ ucwords(implode(' / ', $tramite->tipo ?? ['Trámite'])) }}
                            </span>
                            <span class="bg-teal-100 text-teal-700 px-2 py-0.5 rounded-md text-xs uppercase">
                                Ver más
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-12">
                        <p>No hay resultados para este tipo.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
