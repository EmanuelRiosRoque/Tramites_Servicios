<!-- Sección de Pasos -->
<div 
    x-data="pasos($wire)" 
    class="space-y-4"
    :class="tieneError('pasos') ? 'border border-red-500 p-4 rounded-md' : ''"
>

    <!-- Input de nuevo paso -->
    <div>
        <x-form.input 
            x-model.live="paso" 
            label="Pasos que debe de llevar a cabo el particular para su realización"
            tooltip="Descripción clara, sencilla y concisa de los pasos para realizar el trámite o servicio"
            placeholder="Ingrese paso" 
        />
    </div>

    <!-- Botón Agregar Paso -->
    <button type="button" @click="agregarPaso"
        class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
        <x-lucide-plus-circle class="w-4 h-4" />
        Agregar paso
    </button>

    <!-- Tabla de pasos agregados -->
    <template x-if="pasos.length > 0">
        <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Pasos</th>
                    <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(item, index) in pasos" :key="index">
                    <tr class="border-b border-gray-700">
                        <td class="px-4 py-3 align-top" x-text="item"></td>
                        <td class="px-4 py-3 text-right">
                            <button type="button" @click="eliminarPaso(index)"
                                class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </template>



</div>
