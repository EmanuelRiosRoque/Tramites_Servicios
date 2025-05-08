<div>
    <x-form.radiogroup 
        x-model=formData.tramiteEnLinea
        name="tramiteEnLinea"
        label="¿Es posible realizar el trámite o servicio completamente en línea sin acudir a oficinas gubernamentales?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.cargarDocumentos
        name="cargarDocumentos"
        label="¿Es posible cargar o subir documentos en línea?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.seguimiento
        name="seguimiento"
        label="¿Se puede dar seguimiento? Es decir, mostrar a los interesados el estatus en que se encuentra el trámite o servicio."
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.informacionMedios
        name="informacionMedios"
        label="¿Se puede enviar y recibir información por medios electrónicos con los correspondientes acuses de recepción de datos y documentos?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.respuestaResolucion
        name="respuestaResolucion"
        label="¿La resolución de la respuesta es por internet?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.utilizaFirma
        name="utilizaFirma"
        label="¿Utiliza Firma Electrónica Avanzada?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.radiogroup 
        x-model=formData.realizarNotificaciones
        name="realizarNotificaciones"
        label="¿Es posible realizar notificaciones en línea por información faltante?"
        :options="[
            '1' => 'Si',
            '2' => 'No',
        ]"
    />

    <x-form.input  x-model=formData.demasInformacion name="demasInformacion" label="Demás información que se prevea en la estrategia" placeholder="Ingrese informacion" />

    <input type="hidden" x-model="formData" wire:model.defer="formData">

   
    

</div>