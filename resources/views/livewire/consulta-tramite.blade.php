<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <!-- Título -->
    <h2 class="text-xl sm:text-2xl font-extrabold text-center text-gray-800 mb-6">
        Estos son los trámites y servicios que tiene asignados
    </h2>

    <!-- Tabs -->
    <div class="flex overflow-x-auto border-b mb-6 space-x-4 sm:justify-center">
        <button wire:click="setFiltro('todos')" 
            class="flex-shrink-0 px-4 py-2 border-b-2 font-semibold whitespace-nowrap
            {{ $filtro === 'todos' ? 'border-teal-500 text-teal-600' : 'border-transparent text-gray-600 hover:text-teal-600' }}">
            Todos
        </button>
        <button wire:click="setFiltro('tramite')" 
            class="flex-shrink-0 px-4 py-2 border-b-2 font-semibold whitespace-nowrap
            {{ $filtro === 'tramite' ? 'border-teal-500 text-teal-600' : 'border-transparent text-gray-600 hover:text-teal-600' }}">
            Trámite
        </button>
        <button wire:click="setFiltro('servicio')" 
            class="flex-shrink-0 px-4 py-2 border-b-2 font-semibold whitespace-nowrap
            {{ $filtro === 'servicio' ? 'border-teal-500 text-teal-600' : 'border-transparent text-gray-600 hover:text-teal-600' }}">
            Servicio
        </button>
    </div>

    <!-- Lista de trámites -->
    <div class="space-y-4">
        @forelse ($tramites as $tramite)
            <div class="bg-white shadow-md rounded-md p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <span class="text-gray-700 font-medium">{{ $tramite->nombre_tramite }}</span>

                <a href="{{ route('formulario.tramite', $tramite->id) }}"
                   class="text-sm text-gray-600 hover:text-teal-600 flex items-center space-x-1">
                   
                    @switch($tramite->fk_estatus)
                        @case(1)
                            <x-lucide-pencil class="w-5 h-5 text-gray-600" />
                            <span>Editar</span>
                            @break

                        @case(2)
                            <x-lucide-eye class="w-5 h-5 text-gray-600" />
                            @if (Auth::user()->hasRole('Revisor'))
                                <span>Revisar</span>
                            @else
                                <span>En revisión</span>
                            @endif
                            @break

                        @case(3)
                            <x-lucide-file-warning class="w-5 h-5 text-gray-600" />
                            <span>Rechazado</span>
                            @break

                        @case(4)
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                <div class="flex items-center space-x-1 text-sm text-gray-600 hover:text-teal-600">
                                    <x-lucide-badge-check class="w-5 h-5 text-gray-600" />
                                    <span>Publicado</span>
                                </div>   
                                <a wire:click.prevent="renovarTramite({{ $tramite->id }})"
                                    class="inline-flex items-center text-sm text-blue-600 hover:underline hover:text-blue-700 ml-2 cursor-pointer">
                                     <x-lucide-refresh-ccw class="w-4 h-4 mr-1" />
                                     Renovar
                                 </a>                           
                            </div>
                            @break

                        @default
                            <x-lucide-help-circle class="w-5 h-5 text-gray-600" />
                            <span>Desconocido</span>
                    @endswitch
                </a>
            </div>
        @empty
            <p class="text-center text-gray-500">No hay trámites para este filtro.</p>
        @endforelse
    </div>

</div>
