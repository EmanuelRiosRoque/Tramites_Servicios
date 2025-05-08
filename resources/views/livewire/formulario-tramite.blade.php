<div x-data="validaciones($wire, {{ $fk_estatus === 1 ? 'true' : 'false' }}), @js($documentosGuardados)">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold px-6 py-4">Ingresa los datos solicitados</h1>
        <div class=" overflow-hidden  sm:rounded-lg">
            @if ($tramite->fk_estatus == 3 && $tramite->motivo_rechazo)
            <p class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <strong>Motivo de rechazo:</strong> {{ $tramite->motivo_rechazo }}
            </p>
            @endif
            <div class="flex flex-col sm:flex-row gap-6">

                <!-- Tabs (sidebar en desktop, arriba en mobile) -->
                <x-sidebar-tabs />

                <!-- Formulario -->
                <div class="flex-1">
                    <x-form.formulario-tabs :documentos-guardados="$documentosGuardados" :fkestatus="$fk_estatus"
                        :tramite-servicio-id="$tramiteServicioId" :mostrarMotivoRechazo="$mostrarMotivoRechazo"
                        :descripcion_rechazo="$descripcion_rechazo" />

                    <!-- Botones Anterior / Siguiente -->
                    <div class="flex items-center justify-between">
                        <!-- IZQUIERDA: Botón Guardar -->
                        <div>
                            @if ($fk_estatus == 1)
                            <button type="button"
                                wire:click="submit"
                                x-show="currentIndex !== tabs.length - 1"
                                class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50 transition"
                                wire:loading.attr="disabled"
                                wire:target="submit"
                            >
                                Guardar
                            </button>
                            @endif
                        </div>
                    
                        <!-- DERECHA: Anterior / Siguiente -->
                        <div class="flex items-center space-x-4">
                            <button type="button"
                                @click="previous"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded disabled:opacity-50 transition"
                                :disabled="currentIndex === 0"
                            >
                                Anterior
                            </button>
                    
                            <button type="button"
                                @click="next"
                                class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50 transition"
                                :disabled="currentIndex === tabs.length - 1"
                            >
                                Siguiente
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>


            <div x-show="tab === 'estrategia'" class="w-full flex justify-end mt-6 mb-6">
                <div class="flex flex-wrap items-center gap-4">
                    @if ($mostrarMotivoRechazo)
                    <div class="items-center gap-4 w-full">
                        <x-form.input wire:model="descripcion_rechazo" name="descripcion_rechazo"
                            label="Motivo del Rechazo" placeholder="Describa el motivo del rechazo" />
                        <button type="button" wire:click="rechazar" wire:loading.attr="disabled"
                            class="bg-red-700 hover:bg-red-800 text-white font-semibold py-3 px-6 rounded shadow flex items-center justify-center gap-2">
                            Confirmar Rechazo
                        </button>
                    </div>
                    @endif
                    @if ($fk_estatus == 1 || $fk_estatus == 3)
                    <button type="button" @click="enviarFormularioAccion('enviarRevision')"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded shadow flex items-center gap-2"
                        wire:loading.attr="disabled" wire:target="enviarRevision">
                        <span wire:loading.remove wire:target="enviarRevision">Enviar a Revisión</span>

                        <span wire:loading wire:target="enviarRevision" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                        </span>
                    </button>

                    <button type="button" @click="enviarFormularioAccion('submit')"
                        class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-6 rounded shadow flex items-center gap-2"
                        wire:loading.attr="disabled" wire:target="submit">
                        <span wire:loading.remove wire:target="submit">Guardar</span>

                        <span wire:loading wire:target="submit" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                        </span>
                    </button>
                    @endif


                    @if (auth()->user()->hasRole('Revisor') && $fk_estatus == 2)
                    {{-- Botón Rechazar --}}
                    <button type="button" wire:click="$set('mostrarMotivoRechazo', true)"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded shadow">
                        Rechazar
                    </button>

                    {{-- Botón Aceptar y Publicar --}}
                    <button type="button" wire:click="publicar"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow flex items-center gap-2"
                        wire:loading.attr="disabled" wire:target="publicar">
                        <svg wire:loading wire:target="publicar" class="animate-spin h-4 w-4 text-white" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                        </svg>
                        <span wire:loading.remove wire:target="publicar">Aceptar y Publicar</span>
                    </button>
                    @endif


                    <a href="{{ route('vista.consulta', ['id' => $tramiteServicioId]) }}" target="_blank"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded shadow inline-block text-center"
                        wire:loading.attr="disabled" wire:target="submit">
                        Vista Previa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>