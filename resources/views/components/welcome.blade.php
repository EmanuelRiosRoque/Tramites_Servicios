<div class="p-6 lg:p-8">
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <strong>¡Error!</strong> Verifica todos los campos antes de continuar.
        </div>
    @endif
    <form action="{{ route('tramite.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Origen -->
        <div>
            <label class="block text-sm font-semibold mb-2">Origen Trámite/Servicio</label>
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0">
                <label class="inline-flex items-center">
                    <input type="radio" name="origen" value="1" class="form-radio text-teal-600">
                    <span class="ml-2">TSJCDMX</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="origen" value="2" class="form-radio text-teal-600">
                    <span class="ml-2">CJCDMX</span>
                </label>
            </div>
        </div>

        <!-- Inputs -->
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1" for="nombreTramite">Nombre del Trámite o Servicio</label>
                <input 
                    type="text" 
                    id="nombreTramite" 
                    name="nombreTramite" 
                    placeholder="Nombre"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                >
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1" for="descripcionTramite">Descripción del Trámite o Servicio</label>
                <input 
                    type="text" 
                    id="descripcionTramite" 
                    name="descripcionTramite"
                    placeholder="Descripción" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                >
            </div>
        </div>

        <!-- Checkboxes + Radios -->
        <div class="flex flex-col sm:flex-row sm:gap-8 gap-4">
            
            <!-- Tipo -->
            <div>
                <label class="block text-sm font-semibold mb-2">Tipo de Trámite o Servicio</label>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tipo[]" value="servicio" class="form-checkbox text-teal-600">
                        <span class="ml-2">Servicio</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tipo[]" value="tramite" class="form-checkbox text-teal-600">
                        <span class="ml-2">Trámite</span>
                    </label>
                </div>
            </div>

            <!-- Formato requerido -->
            <div>
                <label class="block text-sm font-semibold mb-2">Formato requerido</label>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0">
                    <label class="inline-flex items-center">
                        <input type="radio" name="formato" value="1" class="form-radio text-teal-600">
                        <span class="ml-2">Sí</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="formato" value="2" class="form-radio text-teal-600">
                        <span class="ml-2">No</span>
                    </label>
                </div>
            </div>

        </div>

        <!-- Botón Guardar -->
        <div class="pt-4">
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-4 px-6 rounded shadow w-full sm:w-auto">
                Guardar Información
            </button>
        </div>

    </form>
</div>
