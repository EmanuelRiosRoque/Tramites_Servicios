<div class="space-y-4">

    <label class="block text-sm font-semibold mb-2">¿Requiere inspección o verificación?</label>
    

        <x-form.radiogroup 
            x-model=formData.requiereInspeccion
            name="requiereInspeccion"
            :options="[
                '1' => 'Si',
                '2' => 'No',
            ]"
        />

        <div x-show="formData.requiereInspeccion == '1'" x-transition>
            <x-form.input x-model="formData.objetivoInspeccion" name="objetivoInspeccion" label="Objetivo de la inspección y verificación" placeholder="Ingrese objetivo" />
            <x-form.input x-model="formData.fundamentoInspeccion" name="fundamentoInspeccion" label="Fundamento jurídico de la inspección y verificación" placeholder="Ingrese fundamento" />
        </div>
    </div>