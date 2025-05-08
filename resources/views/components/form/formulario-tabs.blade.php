<form wire:submit.prevent="submit" class="flex-1 sm:p-8 sm:pl-20 p-5 max-w-2xl" x-data="{ formData: $wire.formData }">

    <div x-show="tab === 'datos'" x-cloak>
        <x-formulario.datos-tramite /> 
    </div>

    <div x-show="tab === 'pasos'" x-cloak>
        <x-formulario.datos-pasos />
    </div>

    <div x-show="tab === 'requisitos'" x-cloak>
        <x-formulario.datos-requisitos />
    </div>

    <div x-show="tab === 'documentos'" x-cloak>
        <x-form.dropzone name="documentosRequeridos" label="Documentos requeridos" accept="application/pdf" multiple
            x-model="formData.documentosRequeridos" />



        @if (!empty($documentosGuardados) && collect($documentosGuardados)->where('tipo', 'documento')->isNotEmpty())
        <div class="mt-8 space-y-3">
            <h3 class="text-lg font-bold text-gray-800 mb-4">📄 Documentos Existentes</h3>

            @foreach ($documentosGuardados as $doc)
            @if ($doc['tipo'] === 'documento')
            <div class="flex items-center justify-between bg-white border rounded-md shadow-sm p-3">
                <div class="flex items-center gap-3">
                    @php
                    $extension = pathinfo($doc['name'], PATHINFO_EXTENSION);
                    @endphp

                    @if ($extension === 'pdf')
                    <div class="w-10 h-10 flex items-center justify-center rounded-md">
                        📄
                    </div>
                    @else
                    <div class="w-10 h-10 bg-gray-100 flex items-center justify-center rounded-md">
                        📎
                    </div>
                    @endif

                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $doc['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ number_format($doc['size'] / 1024, 1) }} KB</p>

                        <a href="{{ asset('storage/' . $doc['ruta']) }}" target="_blank"
                            class="text-xs text-teal-600 underline mt-1 block">
                            Ver archivo
                        </a>
                    </div>
                </div>

                <button type="button" wire:click="eliminarDocumentoExistente({{ $doc['id'] }})"
                    class="p-1 rounded-full hover:bg-red-100">
                    <x-lucide-x class="w-4 h-4 text-red-500" />
                </button>
            </div>
            @endif
            @endforeach
        </div>
        @endif


    </div>

    <div x-show="tab === 'formatos'" x-cloak>
        <x-formulario.datos-formatos />

        @if (!empty($documentosGuardados) && collect($documentosGuardados)->where('tipo', 'formato')->isNotEmpty())
        <div class="mt-8 space-y-3">
            <h3 class="text-lg font-bold text-gray-800 mb-4">📄 Formatos Existentes</h3>

            @foreach ($documentosGuardados as $doc)
            @if ($doc['tipo'] === 'formato')
            <div class="flex items-center justify-between bg-white border rounded-md shadow-sm p-3">
                <div class="flex items-center gap-3">
                    @php
                    $extension = pathinfo($doc['name'], PATHINFO_EXTENSION);
                    @endphp

                    @if ($extension === 'pdf')
                    <div class="w-10 h-10 flex items-center justify-center rounded-md">
                        📄
                    </div>
                    @else
                    <div class="w-10 h-10 bg-gray-100 flex items-center justify-center rounded-md">
                        📎
                    </div>
                    @endif

                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $doc['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ number_format($doc['size'] / 1024, 1) }} KB</p>

                        <a href="{{$doc['ruta']}}" target="_blank"
                            class="text-xs text-teal-600 underline mt-1 block">
                            Ver archivo
                        </a>
                    </div>
                </div>

                <button type="button" wire:click="eliminarDocumentoExistente({{ $doc['id'] }})"
                    class="p-1 rounded-full hover:bg-red-100">
                    <x-lucide-x class="w-4 h-4 text-red-500" />
                </button>
            </div>
            @endif
            @endforeach
        </div>
        @endif


    </div>

    <div x-show="tab === 'verificacion'" x-cloak>
        <x-formulario.datos-inspeccion />
    </div>

    <div x-show="tab === 'plazo'" x-cloak>
        <x-formulario.datos-plazo />
    </div>

    <div x-show="tab === 'monto'" x-cloak>
        <x-formulario.datos-montos />
    </div>

    <div x-show="tab === 'vigencia'" x-cloak>
        <div>
            <x-form.input x-model=formData.vigencia name="vigencia"
                label="Vigencia de los avisos, permisos, licencias, autorizaciones, registros y demás resoluciones que se emitan"
                placeholder="Ingrese vegencia" />
            <x-form.input x-model=formData.fundamentoVigencia name="fundamentoVigencia"
                label="Fundamento Jurídico Vigencia" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'criterio'" x-cloak>
        <div>
            <x-form.input x-model=formData.criterio name="criterio"
                label="Criterios de resolución del trámite o servicio, en su caso" placeholder="Ingrese criterio" />
            <x-form.input x-model=formData.fundamentoCriterio name="fundamentoCriterio"
                label="Fundamento Juridico del criterio" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'unidad'" x-cloak>
        <x-formulario.datos-unidad />
    </div>

    <div x-show="tab === 'otrosMedios'" x-cloak>
        <x-formulario.datos-otrosmedios />
    </div>

    <div x-show="tab === 'informacion'" x-cloak>
        <div>
            <x-form.input x-model=formData.informacion name="informacion"
                label="Informacion que debera conservar para fines de acreditacion, inspeccion y verificacion con motivo del tramite o servicio"
                placeholder="Ingrese informacion" />
            <x-form.input x-model=formData.fundamentoInformacion name="fundamentoInformacion"
                label="Fundamento Jurídico de la Información" placeholder="Ingrese fundamento" />
        </div>
    </div>

    <div x-show="tab === 'estrategia'" x-cloak>
        <x-formulario.datos-estrategia />
    </div>
</form>