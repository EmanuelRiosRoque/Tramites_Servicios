<div 
x-data='otrosMedios($wire)'
x-init="
$watch('telefonos', value => $wire.set('formData.telefonos', value));
$watch('correos', value => $wire.set('formData.correos', value));
"
:class="(tieneError('telefonos') || tieneError('correos') || tieneError('sitiosWebs')) ? 'border border-red-500 p-4 rounded-md' : ''"

>

    <div class="mb-7">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Piso -->
            <x-form.input 
                x-model.live="numumeroTelfono"
                label="Núm. Teléfono" 
            />

            <!-- Unidad Administrativa -->
            <x-form.input 
                x-model.live="areaTelefono"
                label="Área Teléfono"
            />
        </div>

        <div>
            <button 
                type="button" 
                @click="agregarTelefono()"
                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out"
            >
                <x-lucide-plus-circle class="w-4 h-4" />
                Agregar teléfono
            </button>
        </div>

        <template x-if="telefonos.length > 0">
            <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Teléfono</th>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Área</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in telefonos" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item.telefono"></td>
                            <td class="px-4 py-3 align-top" x-text="item.area"></td>
                            <td class="px-4 py-3 text-right">
                                <button 
                                    type="button" 
                                    @click="eliminarTelefono(index)"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </template>
        
    </div>

    <div class="mb-7">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Piso -->
            <x-form.input 
                x-model.live="correoElectronico"
                label="Correo electrónico" 
            />

            <!-- Unidad Administrativa -->
            <x-form.input 
                x-model.live="areaCorreo"
                label="Área Email"
            />
        </div>

        <div>
            <button 
                type="button" 
                @click="agregarCorreo()"
                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out"
            >
                <x-lucide-plus-circle class="w-4 h-4" />
                Agregar correo
            </button>
        </div>

        <template x-if="correos.length > 0">
            <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Correo electrónico</th>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Área</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in correos" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item.correo"></td>
                            <td class="px-4 py-3 align-top" x-text="item.area"></td>
                            <td class="px-4 py-3 text-right">
                                <button 
                                    type="button" 
                                    @click="eliminarCorreo(index)"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </template>
        
    </div>

    <div class="mb-7">
        <x-form.input 
            x-model.live="sitioWeb"
            label="Sitios web" 
        />

        <div>
            <button 
                type="button" 
                @click="agregarSitioWeb()"
                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out"
            >
                <x-lucide-plus-circle class="w-4 h-4" />
                Agregar sitio
            </button>
        </div>

        <template x-if="sitiosWebs.length > 0">
            <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Sitio Web</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in sitiosWebs" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item"></td>
                            <td class="px-4 py-3 text-right">
                                <button 
                                    type="button" 
                                    @click="eliminarSitioWeb(index)"
                                    class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </template>
        
        
    </div>

    <x-form.input 
        x-model="formData.demasDatosRelativos"
        name=demasDatosRelativos
        label="Demás datos relativos a cualquier otro medio que permita el envío de consultas, documentos y quejas" 
        placeholder="Ingrese datos" 
    />
</div>