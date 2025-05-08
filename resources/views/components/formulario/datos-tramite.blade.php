<div>
    <x-form.input x-model="formData.modalidad" name="modalidad" label="Modalidad" placeholder="Modalidad" />
    <x-form.input x-model="formData.fundamentoExtension" name="fundamentoExtension" label="Fundamento Jurídico" placeholder="Ingrese Fundamento" />
    <x-form.select
        x-model="formData.areaObligada"
        name="areaObligada"
        label="Área obligada responsable"
        :options="[
            '' => 'Seleccione',
            '1' => 'Dirección Ejecutiva de Gestión Tecnológica',
            '2' => 'Dirección de Gestión Tecnológica',
            '3' => 'Dirección de Desarrollo y Mantenimiento de Sistemas',
            '4' => 'Dirección de Operación y Control',
            '5' => 'Dirección de Comunicaciones y Seguridad',
            '6' => 'Dirección de Ingeniería y Soporte a la Oralidad',
            '7' => 'Coordinación de Proyectos',
            '8' => 'Difusión y Diseño'
        ]"
        placeholder="Seleccione"
    />

    <x-form.input x-model="formData.nombreTramite" name="nombreTramite" label="Nombre del Trámite" placeholder="Nombre" />
    <x-form.input x-model="formData.descripcionTramite" name="descripcionTramite" label="Descripción" placeholder="Descripcion" />

    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">Tipo de Trámite o Servicio</label>
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
                <input type="checkbox" value="servicio" x-model="formData.tipo" class="form-checkbox text-teal-600">
                <span class="ml-2">Servicio</span>
            </label>
            <label class="inline-flex items-center">
                <input type="checkbox" value="tramite" x-model="formData.tipo" class="form-checkbox text-teal-600">
                <span class="ml-2">Trámite</span>
            </label>
        </div>
    </div>
</div>
