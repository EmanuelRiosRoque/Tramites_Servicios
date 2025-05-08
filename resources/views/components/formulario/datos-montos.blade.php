<div x-data="monto($wire)" 
class="space-y-6">

<div 
:class="(tieneError('montos')) ? 'border border-red-500 p-4 rounded-md' : ''"
>
    <x-form.input 
        x-model.live="monto"
        tooltip="-Monto de los derechos o aprovechamientos aplicables, en su caso, o la forma de determinar dicho monto, así como las alternativas para realizar el pago:"
        label="Monto" 
        placeholder="Ingrese monto, forma o alternativa" 
    />


    <button type="button" @click="agregarMonto"
        class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
        <x-lucide-plus-circle class="w-4 h-4" />
        Agregar monto
    </button>

    <template x-if="montos.length > 0">
        <table class="min-w-full text-sm text-gray-800 mt-5">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Monto</th>
                    <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(item, index) in montos" :key="index">
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-3 align-top" x-text="item"></td>
                        <td class="px-4 py-3 text-right">
                            <button @click="eliminarMonto(index)" type="button"
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
    <x-form.input x-model="formData.fundamentoMonto" name="fundamentoMonto" label="Fundamento Jurídico del Monto" placeholder="Ingrese fundamento" />
</div>