<div 
x-data="plazo($wire)" 
:class="(tieneError('fundamentosPlazo')) ? 'border border-red-500 p-4 rounded-md' : ''"
class="space-y-6">
                        
    <x-form.input x-model="formData.plazo" name="plazo" tooltip="Plazo que tiene el sujeto obligado para resolver el trámite o servicio y en su caso si aplica la afirmativa o la negativa ficta" label="Plazo" placeholder="Ingrese plazo" />
    <x-form.input x-model="formData.plazoSujeto" name="plazoSujeto" label="Plazo con el que cuenta el sujeto obligado para prevenir al solicitante" placeholder="Ingrese plazo" />
    <x-form.input x-model="formData.plazoSolicitante" name="plazoSolicitante" label="Plazo con el que cuenta el solicitante para cumplir con la prevención" placeholder="Ingrese plazo" />

    <x-form.input 
        tooltip="Fundamento jurídico del plazo para resolver el trámite o servicio, plazos de prevención y criterios de resolución"
        x-model.live="fundamentoPlazo"
        label="Fundamento Jurídico del plazo" 
        placeholder="Ingrese fundamento" 
    />
    
    <button type="button" @click="agregarfundamentoPlazo"
        class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
        <x-lucide-plus-circle class="w-4 h-4" />
        Agregar fundamento
    </button>

    <template x-if="fundamentosPlazo.length > 0">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Fundamento Jurídico</th>
                    <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(item, index) in fundamentosPlazo" :key="index">
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-3 align-top" x-text="item"></td>
                        <td class="px-4 py-3 text-right">
                            <button @click="eliminarfundamentoPlazo(index)" type="button"
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