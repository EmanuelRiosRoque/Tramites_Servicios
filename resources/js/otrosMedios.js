export default (wire = null) => ({
    // TELÉFONOS
    numumeroTelfono: '',
    areaTelefono: '',
    telefonos: wire ? wire.get('formData.telefonos') || [] : [],

    // CORREOS
    correoElectronico: '',
    areaCorreo: '',
    correos: wire ? wire.get('formData.correos') || [] : [],

    //SITIOS
    sitioWeb: '',
    sitiosWebs: wire ? wire.get('formData.sitiosWebs') || [] : [],

    agregarTelefono() {
        if (this.numumeroTelfono.trim() !== '' && this.areaTelefono.trim() !== '') {
            this.telefonos.push({
                telefono: this.numumeroTelfono.trim(),
                area: this.areaTelefono.trim()
            });
            this.sync();
            this.numumeroTelfono = '';
            this.areaTelefono = '';
        } else {
            alert('Completa el número y área para agregar el teléfono.');
        }
    },

    eliminarTelefono(index) {
        this.telefonos.splice(index, 1);
        this.sync();
    },

    agregarCorreo() {
        if (this.correoElectronico.trim() !== '' && this.areaCorreo.trim() !== '') {
            this.correos.push({
                correo: this.correoElectronico.trim(),
                area: this.areaCorreo.trim()
            });
            this.sync();
            this.correoElectronico = '';
            this.areaCorreo = '';
        } else {
            alert('Completa el correo y área para agregar el correo.');
        }
    },

    eliminarCorreo(index) {
        this.correos.splice(index, 1);
        this.sync();
    },

    agregarSitioWeb() {
        if (this.sitioWeb.trim() !== '') {
            this.sitiosWebs.push(this.sitioWeb.trim()); // << Solo el string directo
            this.sync();
            this.sitioWeb = '';
        } else {
            alert('Completa el Sitio Web para agregar.');
        }
    },
    
    eliminarSitioWeb(index) {
        this.sitiosWebs.splice(index, 1);
        this.sync();
    },

    sync() {
        wire?.set('formData.telefonos', [...this.telefonos]);
        wire?.set('formData.correos', [...this.correos]);
        wire?.set('formData.sitiosWebs', [...this.sitiosWebs]);
    }
});
