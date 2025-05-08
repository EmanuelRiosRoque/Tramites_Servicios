<div 
    x-data="requisitos($wire)" 
    class="space-y-6"
    :class="(tieneError('requisitos') || tieneError('fundamentos')) ? 'border border-red-500 p-4 rounded-md' : ''"
>                    
    <!-- Requisitos -->
    <div class="space-y-4">
        <x-form.input 
            x-model.live="requisito" 
            tooltip="En caso que existan requisitos que necesiten firma, validación, autorización..." 
            label="Enumerar y Detallar los Requisitos" 
            placeholder="Ingrese requisito"
        />

        <button type="button" @click="agregarRequisito"
            class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
            <x-lucide-plus-circle class="w-4 h-4" />
            Agregar requisito
        </button>

        <template x-if="requisitos.length > 0">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Requisito</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in requisitos" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item"></td>
                            <td class="px-4 py-3 text-right">
                                <button type="button" @click="eliminarRequisito(index)"
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

    <!-- Fundamentos jurídicos -->
    <div class="space-y-4">
        <x-form.input 
            x-model.live="fundamentoRequisito" 
            label="Fundamento Jurídico del Requisito" 
            placeholder="Ingrese fundamento"
        />

        <button type="button" @click="agregarFundamentoRequisito"
            class="inline-flex items-center gap-2 border border-cyan-400 text-cyan-700 font-medium bg-cyan-50 hover:bg-cyan-100 px-4 py-2 rounded-md text-sm transition duration-150 ease-in-out">
            <x-lucide-plus-circle class="w-4 h-4" />
            Agregar fundamento
        </button>

        <template x-if="fundamentos.length > 0">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b border-gray-300 font-semibold">Fundamento Jurídico</th>
                        <th class="text-right px-4 py-2 border-b border-gray-300 font-semibold">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(item, index) in fundamentos" :key="index">
                        <tr class="border-b border-gray-300">
                            <td class="px-4 py-3 align-top" x-text="item"></td>
                            <td class="px-4 py-3 text-right">
                                <button type="button" @click="eliminarFundamento(index)"
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
</div>
