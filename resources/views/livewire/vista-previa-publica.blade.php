<div class="min-h-screen bg-white text-gray-800 grid grid-cols-1 md:grid-cols-12">

    <!-- Apartado izquierdo (menú lateral) -->
    <aside class="hidden md:block md:col-span-3 bg-gray-100 p-6">
        <nav class="space-y-4">
            <a href="#" class="flex justify-end items-center space-x-2 hover:text-teal-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Todos</span>
            </a>
            <!-- Aquí podrías agregar más links -->
        </nav>
        
    </aside>

    <!-- Contenido principal -->
    <main class="col-span-12 md:col-span-9 p-8 grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Columna izquierda (contenido) -->
        <div class="space-y-6">
            <div class=" border-b">
                <h1>{{ $tramite->nombre_tramite ?? $tramite->nombreTramite }}</h1>
            </div>

            <h2 class="text-lg font-bold">Descripción del Trámite o Servicio</h2>
            <p>{{ $tramite->descripcion ?? $tramite->descripcionTramite }}</p>

            <h2 class="text-lg font-bold">Fundamento Jurídico de la Existencia del Trámite o Servicio</h2>
            <p>{{ $tramite->fundamento_existencia ?? $tramite->fundamentoExtension }}</p>

            <h2 class="text-lg font-bold">Pasos</h2>
            @if (is_a($tramite->pasos, 'Illuminate\Support\Collection') && $tramite->pasos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->pasos as $paso)
                        <li>{{ $paso->paso }}</li>
                    @endforeach
                </ul>
            @elseif (!empty($tramite->pasos) && is_array($tramite->pasos))
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->pasos as $paso)
                        <li>{{ $paso }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay pasos registrados.</p>
            @endif

            <h2 class="text-lg font-bold">Requisitos</h2>
            @if (is_a($tramite->requisitos, 'Illuminate\Support\Collection') && $tramite->requisitos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->requisitos as $requisito)
                        <li>{{ $requisito->requisito }}</li>
                    @endforeach
                </ul>
            @elseif (!empty($tramite->requisitos) && is_array($tramite->requisitos))
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->requisitos as $requisito)
                        <li>{{ $requisito }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay requisitos registrados.</p>
            @endif


            {{-- {{ $tramite->fundamentoRequisitos }} --}}
            <h2 class="text-lg font-bold">Fundamento Jurídico de Requisitos</h2>
            @if (is_a($tramite->fundamentoRequisitos, 'Illuminate\Support\Collection') && $tramite->fundamentoRequisitos->count())
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->fundamentoRequisitos as $fundamentoRequsito)
                        <li>{{ $fundamentoRequsito->fundamento }}</li>
                    @endforeach
                </ul>
            @elseif (!empty($tramite->fundamentos) && is_array($tramite->fundamentos))
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($tramite->fundamentos as $fundamento)
                        <li>{{ $fundamento }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay fundamentos registrados.</p>
            @endif


            <h2 class="text-lg font-bold">Inspección o Verificación</h2>
            <p>{{ ($tramite->requiere_inspeccion ?? $tramite->requiereInspeccion) == 1 ? 'Sí' : 'No' }}</p>

            {{-- {{ $tramite->documentosFormatos }} --}}
            <h2 class="text-lg font-bold">FORMATOS Y DOCUMENTOS REQUERIDOS:</h2>
            @php
                $documentos = $tramite->documentosFormatos ?? $tramite->documentosRequeridos ?? [];
                $formatos = $tramite->formatosRequeridos ?? [];
            @endphp

            @if (!empty($documentos) || !empty($formatos))
                <ul class="list-decimal pl-5 space-y-2">
                    @foreach ($documentos as $doc)
                        <li>
                            <a 
                                href="{{ $doc->ruta_archivo ?? $doc['ruta'] ?? '#' }}" 
                                target="_blank" 
                                class="text-blue-600 hover:underline"
                            >
                                {{ $doc->nombre_archivo ?? $doc['name'] ?? 'Documento' }} - {{ $doc->tipo ?? $doc['tipo'] ?? 'documento' }}
                            </a>
                        </li>
                    @endforeach
                    @foreach ($formatos as $formato)
                        <li>
                            <a 
                                href="{{ $formato['ruta'] ?? '#' }}" 
                                target="_blank" 
                                class="text-blue-600 hover:underline"
                            >
                                {{ $formato['name'] ?? 'Formato' }} - {{ $formato['tipo'] ?? 'formato' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay formatos ni documentos registrados.</p>
            @endif

            
            <h2 class="text-lg font-bold">UNIDADES ADMINISTRATIVAS ANTE LAS QUE SE PUEDE PRESENTAR EL TRÁMITE O SOLICITAR EL SERVICIO</h2>
            @php
            $areas = [];

            // 🧠 Si viene de MySQL
            if (!empty($tramite->inmueblesTramite)) {
                foreach ($tramite->inmueblesTramite as $inmueble) {
                    $unidad = $inmueble->unidad_administrativa;
                    $areas[$unidad]['unidad'] = $unidad;
                    $areas[$unidad]['inmueble'] = $inmueble->inmueble->direccion ?? 'Sin nombre';
                    $areas[$unidad]['pisos'][] = $inmueble->piso; // ahora es array
                }

                foreach ($tramite->horarios as $horario) {
                    $areas[$horario->area]['horarios'][] = $horario->horario_atencion;
                }

                foreach ($tramite->telefonos as $telefono) {
                    $areas[$telefono->area]['telefonos'][] = $telefono->numero;
                }

                foreach ($tramite->correos as $correo) {
                    $areas[$correo->area]['correos'][] = $correo->correo;
                }

            // 🧠 Si viene de Mongo
            } elseif (!empty($tramite->domicilios) && is_array($tramite->domicilios)) {
                foreach ($tramite->domicilios as $domicilio) {
                    $unidad = $domicilio['unidad'] ?? 'Desconocida';
                    $areas[$unidad]['unidad'] = $unidad;
                    $areas[$unidad]['inmueble'] = $domicilio['direccion'] ?? 'Sin nombre';
                    $areas[$unidad]['pisos'][] = $domicilio['piso'] ?? null;
                }

                foreach ($tramite->horarios ?? [] as $horario) {
                    $area = $horario['area'] ?? 'Desconocida';
                    $areas[$area]['horarios'][] = $horario['horario'] ?? '';
                }

                foreach ($tramite->telefonos ?? [] as $telefono) {
                    $area = $telefono['area'] ?? 'Desconocida';
                    $areas[$area]['telefonos'][] = $telefono['telefono'] ?? '';
                }

                foreach ($tramite->correos ?? [] as $correo) {
                    $area = $correo['area'] ?? 'Desconocida';
                    $areas[$area]['correos'][] = $correo['correo'] ?? '';
                }
            }
            @endphp

        
            @if (!empty($areas))
            @foreach ($areas as $area => $datos)
                <div class="bg-gray-100 rounded-md overflow-hidden border border-gray-300 mb-6">
                    <div class="p-4 border-b border-gray-300">
                        <strong>Área:</strong> {{ $datos['unidad'] ?? $area }}
                    </div>
        
                    @isset($datos['inmueble'])
                        <div class="p-4 border-b border-gray-300">
                            <strong>Inmueble:</strong> {{ $datos['inmueble'] }}
                        </div>
                    @endisset
        
                    @isset($datos['horarios'])
                        <div class="p-4 border-b border-gray-300">
                            <strong>Horarios:</strong>
                            <ul class="list-disc list-inside">
                                @foreach ($datos['horarios'] as $h)
                                    <li>{{ $h }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
        
                    @isset($datos['pisos'])
                        <div class="p-4 border-b border-gray-300">
                            <strong>Pisos:</strong>
                            <ul class="list-disc list-inside">
                                @foreach ($datos['pisos'] as $p)
                                    <li>{{ $p }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
        
                    @isset($datos['correos'])
                        <div class="p-4 border-b border-gray-300">
                            <strong>Correos:</strong>
                            <ul class="list-disc list-inside">
                                @foreach ($datos['correos'] as $c)
                                    <li>{{ $c }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
        
                    @isset($datos['telefonos'])
                        <div class="p-4">
                            <strong>Teléfonos:</strong>
                            <ul class="list-disc list-inside">
                                @foreach ($datos['telefonos'] as $t)
                                    <li>{{ $t }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No hay datos registrados.</p>
        @endif
        
        
         

        <h2 class="text-lg font-bold">Sitios web</h2>

        @if ($tramite->sitiosWeb && $tramite->sitiosWeb instanceof \Illuminate\Support\Collection && $tramite->sitiosWeb->count())
            <ul class="list-decimal pl-5 space-y-2">
                @foreach ($tramite->sitiosWeb as $sitio)
                    <li>
                        <a href="{{ $sitio->sitio }}" target="_blank" class="text-blue-600 underline">
                            {{ $sitio->sitio }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @elseif (!empty($tramite->sitiosWebs) && is_array($tramite->sitiosWebs))
            <ul class="list-decimal pl-5 space-y-2">
                @foreach ($tramite->sitiosWebs as $sitio)
                    <li>
                        <a href="{{ $sitio }}" target="_blank" class="text-blue-600 underline">
                            {{ $sitio }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No hay sitios web registrados.</p>
        @endif
        
        

            <h2 class="text-lg font-bold mt-8">Objetivo de la inspección y verificación:</h2>
            <p>{{ $tramite->objetivo_inspeccion ?? $tramite->objetivoInspeccion}}</p>

            <h2 class="text-lg font-bold mt-8">Fundamento jurídico de la inspección y verificación:</h2>
            <p>{{ $tramite->fundamento_inspeccion  ?? $tramite->fundamentoInspeccion}}</p>
            <h2 class="text-lg font-bold mt-8">Información que deberá conservar para fines de acreditación , inspección y verificación con motivo del trámite o servicio:</h2>
            <p>{{ $tramite->informacion ?? $tramite->informacion }}</p>
            <h2 class="text-lg font-bold mt-8">Demás información que se prevea en la estrategia:</h2>
            <p>{{ $tramite->demas_informacion ?? $tramite->demasInformacion }}</p>

        </div>

        <!-- Columna derecha (servicio) -->
        <div class="space-y-6 ">
            <h2 class="text-2xl font-bold">Servicio</h2>

            <div class="space-y-4">
                <div>
                    <strong>Nombre:</strong>
                    <p>{{ $tramite->nombre_tramite ?? $tramite->nombreTramite}}</p>
                </div>
            
                @php
                    // Convertimos a string si es un array
                    $tipoTexto = is_array($tramite->tipo) ? implode(', ', $tramite->tipo) : $tramite->tipo;

                    // Normalizamos el texto en minúsculas
                    $tipoTexto = strtolower($tipoTexto);

                    // Corregimos las palabras específicas con acento y mayúscula inicial
                    $tipoTexto = str_replace(['tramite', 'servicio'], ['Trámite', 'Servicio'], $tipoTexto);
                @endphp
                <div>
                    <strong>Tipo:</strong>
                    <p>{{ $tipoTexto }}</p>
                </div>
                

          
                <div>
                    <strong>Modalidad:</strong>
                    <p>{{ $tramite->modalidad }}</p>
                </div>
            
                <div>
                    <strong>¿Quién puede solicitarlo?:</strong>
                    <p>Público en general</p>
                </div>
            
                <div>
                    <strong>Tiempo de Plazo:</strong>
                    <p>{{ $tramite->plazo }}</p>
                </div>
            
                <div>
                    <strong>Fundamento Jurídico del plazo:</strong>
                    @if (is_a($tramite->fundamentosPlazo, 'Illuminate\Support\Collection') && $tramite->fundamentosPlazo->count())
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->fundamentosPlazo as $fundamento)
                                <li>{{ $fundamento->fundamento }}</li>
                            @endforeach
                        </ul>
                    @elseif (!empty($tramite->fundamentosPlazo) && is_array($tramite->fundamentosPlazo))
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->fundamentosPlazo as $fundamento)
                                <li>{{ $fundamento }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No hay fundamentos registrados.</p>
                    @endif

                </div>
            
                <div>
                    <strong>Vigencia:</strong>
                    <p>{{ $tramite->vigencia }}</p>
                </div>
            
                <div>
                    <strong>Fundamento Jurídico de la Vigencia:</strong>
                    <p>{{ $tramite->fundamento_vigencia ?? $tramite->fundamentoVigencia}}</p>
                </div>
            
                <div>
                    <strong>Monto:</strong>
                    @if (is_a($tramite->montos, 'Illuminate\Support\Collection') && $tramite->montos->count())
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->montos as $monto)
                                <li>{{ $monto->monto }}</li>
                            @endforeach
                        </ul>
                    @elseif (!empty($tramite->montos) && is_array($tramite->montos))
                        <ul class="list-decimal pl-5 space-y-2">
                            @foreach ($tramite->montos as $monto)
                                <li>{{ $monto }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No hay montos registrados.</p>
                    @endif
                
                </div>
            
                <div>
                    <strong>Fundamento jurídico del Monto:</strong>
                    <p>{{ $tramite->fundamento_monto ?? $tramite->fundamentoMonto}}</p>
                </div>
            
                <div>
                    <strong>Plazo con el que cuenta el sujeto obligado para prevenir al solicitante:</strong>
                    <p>{{ $tramite->plazo_solicitante ?? $tramite->plazoSolicitante }}</p>
                </div>
            
                <div>
                    <strong>Plazo con el que cuenta el solicitante para cumplir con la prevención:</strong>
                    <p>{{ $tramite->sujeto ?? $tramite->plazoSujeto}}</p>
                </div>
            
                <div>
                    <strong>Criterios de resolución del trámite o servicio, en su caso:</strong>
                    <p>{{ $tramite->criterio }}</p>
                </div>

                <div>
                    <strong>Demás datos relativos a cualquier otro medio que permita el envío de consultas, documentos y quejas:</strong>
                    <p>{{ $tramite->demas_informacion ?? $tramite->demasDatosRelativos}}</p>
                </div>
            </div>
            
        </div>

    </main>    
</div>
