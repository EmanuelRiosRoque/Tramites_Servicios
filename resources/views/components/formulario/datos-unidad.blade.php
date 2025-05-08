<div 
x-data="unidad($wire)" 
x-init="$watch('domicilios', value => $wire.set('formData.domicilios', value));"
:class="(tieneError('domicilios') || tieneError('horarios')) ? 'border border-red-500 p-4 rounded-md' : ''"

class="space-y-6"
>
                            
    <div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Inmueble -->
            <x-form.select
                x-model.live="id_inmueble"
                label="Inmueble"
                :options="[
                    '' => 'Seleccione',
                    '1' => 'Inmueble Niños Héroes No. 119',
                    '2' => 'Inmueble Niños Héroes No. 132',
                    '3' => 'Inmueble Niños Héroes No. 150',
                    '4' => 'Inmueble Torre Norte',
                    '5' => 'Inmueble Torre Sur',
                    '6' => 'Inmueble Claudio Bernard',
                    '7' => 'Inmueble Instituto de Ciencias Forenses',
                    '8' => 'Inmueble Centro de Justicia alternativa',
                    '9' => 'Inmueble Patriotismo',
                    '10' => 'Inmueble Dr. Liceaga',
                    '11' => 'Inmueble Dr. Lavista',
                    '12' => 'Inmueble Clementina Gil de Léster',
                    '13' => 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero',
                    '14' => 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez',
                    '15' => 'Inmueble Centro de Desarrollo Infantil Niños Héroes',
                    '16' => 'Inmueble Archivo Delicias',
                    '17' => 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl',
                    '18' => 'Inmueble Archivo Dr. Navarro',
                    '20' => 'Inmueble Reclusorio Preventivo Norte',
                    '21' => 'Inmueble Reclusorio Preventivo Sur',
                    '23' => 'Inmueble Reclusorio Preventivo Oriente',
                    '24' => 'Inmueble Reclusorio Preventivo Santa Martha Acatitla',
                    '25' => 'Inmueble Plaza Juarez',
                    '26' => 'Inmueble Lerma',
                ]"
                placeholder="Seleccione"
            />

            <!-- Piso -->
            <x-form.input 
                x-model.live="piso"
                label="Piso" 
                placeholder="Ingrese el piso"
            />

            <!-- Unidad Administrativa -->
            <x-form.input 
                x-model.live="unidadAdministrativa"
                label="Unidad Administrativa"
                placeholder="Ingrese la unidad administrativa"
            />
        </div>

        <!-- Botón agregar domicilio -->
        <div>
            <button 
                type="button" 
                @click="agregarDomicilio()"
                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out"
            >
                <x-lucide-plus-circle class="w-4 h-4" />
                Agregar domicilio
            </button>
        </div>

        <!-- Tabla de domicilios agregados -->
        <template x-if="domicilios.length > 0">
            <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Inmueble</th>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Piso</th>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Unidad</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in domicilios" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item.nombre_inmueble"></td>
                            <td class="px-4 py-3 align-top" x-text="item.piso"></td>
                            <td class="px-4 py-3 align-top" x-text="item.unidad"></td>
                            <td class="px-4 py-3 text-right">
                                <button 
                                    type="button" 
                                    @click="eliminarDomicilio(index)"
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

    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Piso -->
            <x-form.input 
                x-model.live="horarioAtencion"
                label="Horarios de atención al público" 
                placeholder="Ingrese el piso"
            />

            <!-- Unidad Administrativa -->
            <x-form.input 
                x-model.live="areaHorario"
                label="Área"
                placeholder="Ingrese la unidad administrativa"
            />
        </div>

        <div>
            <button 
                type="button" 
                @click="agregarHorario()"
                class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out"
            >
                <x-lucide-plus-circle class="w-4 h-4" />
                Agregar horario
            </button>
        </div>

        <template x-if="horarios.length > 0">
            <table class="min-w-full mt-4 text-sm text-gray-800 border-gray-400">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Horario de Atención</th>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Área</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in horarios" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item.horario"></td>
                            <td class="px-4 py-3 align-top" x-text="item.area"></td>
                            <td class="px-4 py-3 text-right">
                                <button 
                                    type="button" 
                                    @click="eliminarHorario(index)"
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

</div>