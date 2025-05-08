<div
    x-data
    x-effect="
        if (formData.formatoRequerido == '2') {
            formData.tipoFormato = '';
            formData.otroFormato = '';
            formData.formatosRequeridos = [];
            formData.ultimaFechaPublicacion = '';
            formData.fundamentoFormato = '';
        }
    "
>
    <!-- Radios -->
    <label class="block text-sm font-semibold mb-2">Formato Requerido</label>
    <div class="flex items-center space-x-6">
        <label class="inline-flex items-center">
            <input 
                type="radio" 
                name="formatoRequerido" 
                value="1" 
                class="form-radio text-teal-600"
                x-model="formData.formatoRequerido"
            >
            <span class="ml-2">Sí</span>
        </label>
        <label class="inline-flex items-center">
            <input 
                type="radio" 
                name="formatoRequerido" 
                value="2" 
                class="form-radio text-teal-600"
                x-model="formData.formatoRequerido"
            >
            <span class="ml-2">No</span>
        </label>
    </div>

    <!-- Dropzone visible solo si se selecciona "Sí" -->
    <div x-show="formData.formatoRequerido == '1'" x-transition class="mt-5">
        <x-form.radiogroup 
            x-model="formData.tipoFormato"
            name="tipoFormato"
            :options="[
                '1' => 'Formato',
                '2' => 'Escrito Libre',
                '3' => 'Ambos',
                '4' => 'Otros Medios',
            ]"
        />
        <div x-show="formData.tipoFormato === '4'" x-transition>
            <x-form.input 
                x-model="formData.otroFormato" 
                name="otroFormato" 
                label="Otros Medios" 
                placeholder="Ingrese que otro medio" 
            />
        </div>

        <x-form.dropzone 
            name="formatosRequeridos"
            label="Formatos requeridos para el trámite o servicio"
            accept="application/pdf"
            multiple
            x-model="formData.formatosRequeridos"
        />

        <div class="mt-5">
            <x-form.input 
                x-model="formData.ultimaFechaPublicacion" 
                type="date"
                name="ultimaFechaPublicacion" 
                label="Última Fecha de publicación en el Medio de Difusión" 
            />
        </div>
    </div>

    <div class="mt-5">
        <x-form.input 
        x-model="formData.fundamentoFormato" 
        name="fundamentoFormato" 
        label="Fundamento Jurídico Formato" 
        placeholder="Ingrese fundamento" 
        />
    </div>
</div>
