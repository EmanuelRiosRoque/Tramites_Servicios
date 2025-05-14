// resources/js/tu-archivo-de-tabs.js

export default (wire = null, validar = true, documentosGuardados) => ({ // ← NUEVO parámetro

    // Estado inicial
    tab: 'datos',
    tabs: [
        'datos', 'pasos', 'requisitos', 'documentos', 'formatos', 'verificacion',
        'plazo', 'monto', 'vigencia', 'criterio', 'unidad', 'otrosMedios',
        'informacion', 'estrategia'
    ],
    currentIndex: 0,
    errorMessage: '',
    camposInvalidos: [],
    tabsConError: [],
    validacionActiva: validar, // Bandera para habilitar/deshabilitar validación

    init() {
        setTimeout(() => {
            this.$watch('$wire.formData.pasos', () => this.limpiarCampoError('pasos'));
            this.$watch('$wire.formData.requisitos', () => this.limpiarCampoError('requisitos'));
            this.$watch('$wire.formData.fundamentos', () => this.limpiarCampoError('fundamentos'));
            this.$watch('$wire.formData.fundamentosPlazo', () => this.limpiarCampoError('fundamentosPlazo'));
            this.$watch('$wire.formData.montos', () => this.limpiarCampoError('montos'));
            this.$watch('$wire.formData.domicilios', () => this.limpiarCampoError('domicilios'));
            this.$watch('$wire.formData.horarios', () => this.limpiarCampoError('horarios'));
            this.$watch('$wire.formData.telefonos', () => this.limpiarCampoError('telefonos'));
            this.$watch('$wire.formData.correos', () => this.limpiarCampoError('correos'));
            this.$watch('$wire.formData.sitiosWebs', () => this.limpiarCampoError('sitiosWebs'));
        }, 100);

        this.$root.addEventListener('limpiar-error', (e) => {
            this.limpiarCampoError(e.detail.campo);
        });

        this.$root.addEventListener('marcar-error', (e) => {
            if (!this.camposInvalidos.includes(e.detail.campo)) {
                this.camposInvalidos.push(e.detail.campo);
            }
        });
    },

    next() {
        const formData = wire?.formData || {};

        if (this.currentIndex < this.tabs.length - 1) {
            this.camposInvalidos = [];

            if (this.validateTab(this.tab)) {
                this.errorMessage = '';
                this.currentIndex++;
                this.tab = this.tabs[this.currentIndex];
            } else {
                this.errorMessage = 'Completa los datos de este apartado antes de continuar.';
            }
        }
    },

    previous() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
            this.tab = this.tabs[this.currentIndex];
            this.errorMessage = '';
            this.camposInvalidos = [];
        }
    },

    cambiarTab(nuevoTab) {
        if (this.validateTab(this.tab)) {
            this.errorMessage = '';
            this.tab = nuevoTab;
            this.currentIndex = this.tabs.indexOf(nuevoTab);
            this.tabsConError = this.tabsConError.filter(tab => tab !== this.tab);
        } else {
            this.errorMessage = 'Completa los datos de este apartado antes de cambiar.';
            if (!this.tabsConError.includes(this.tab)) {
                this.tabsConError.push(this.tab);
            }
        }
    },

    validateTab(tabActual) {
        this.camposInvalidos = [];

        //   Si la validación está desactivada, automáticamente pasa
        if (!this.validacionActiva) {
            return true;
        }

        const formData = wire?.formData || {};

        switch (tabActual) {
            case 'datos':
                if (!formData.modalidad) this.camposInvalidos.push('modalidad');
                if (!formData.fundamentoExtension) this.camposInvalidos.push('fundamentoExtension');
                // if (!formData.areaObligada) this.camposInvalidos.push('areaObligada');
                if (!formData.nombreTramite) this.camposInvalidos.push('nombreTramite');
                if (!formData.descripcionTramite) this.camposInvalidos.push('descripcionTramite');
                return this.camposInvalidos.length === 0;

            case 'pasos':
                if (!Array.isArray(formData.pasos) || !formData.pasos.length) this.camposInvalidos.push('pasos');
                return this.camposInvalidos.length === 0;

            case 'requisitos':
                if (!Array.isArray(formData.requisitos) || !formData.requisitos.length) this.camposInvalidos.push('requisitos');
                if (!Array.isArray(formData.fundamentos) || !formData.fundamentos.length) this.camposInvalidos.push('fundamentos');
                return this.camposInvalidos.length === 0;

            case 'documentos':
                return true;

                case 'formatos':
                if (formData.formatoRequerido == 1) {
                    // Consultamos en vivo a wire
                    const documentosActuales = wire?.documentosGuardados || [];
                    const tieneFormatoGuardado = documentosActuales.some(doc => doc.tipo === 'formato');
            
                    if (!tieneFormatoGuardado) {
                        if (!Array.isArray(formData.formatosRequeridos) || !formData.formatosRequeridos.length) {
                            this.camposInvalidos.push('formatosRequeridos');
                        }
                    }
            
                    if (!formData.tipoFormato) this.camposInvalidos.push('tipoFormato');
                    if (!formData.fundamentoFormato) this.camposInvalidos.push('fundamentoFormato');
                    if (!formData.ultimaFechaPublicacion) this.camposInvalidos.push('ultimaFechaPublicacion');
                }
            
                if (formData.tipoFormato == 4 && !formData.otroFormato) {
                    this.camposInvalidos.push('otroFormato');
                }
            
                return this.camposInvalidos.length === 0;
            
            
            

            case 'verificacion':
                if (formData.requiereInspeccion == 1) {
                    if (!formData.objetivoInspeccion) this.camposInvalidos.push('objetivoInspeccion');
                    if (!formData.fundamentoInspeccion) this.camposInvalidos.push('fundamentoInspeccion');
                } else if (formData.requiereInspeccion === null) {
                    this.camposInvalidos.push('requiereInspeccion');
                }
                return this.camposInvalidos.length === 0;

            case 'plazo':
                if (!formData.plazo) this.camposInvalidos.push('plazo');
                if (!formData.plazoSujeto) this.camposInvalidos.push('plazoSujeto');
                if (!formData.plazoSolicitante) this.camposInvalidos.push('plazoSolicitante');
                if (!Array.isArray(formData.fundamentosPlazo) || !formData.fundamentosPlazo.length) this.camposInvalidos.push('fundamentosPlazo');
                return this.camposInvalidos.length === 0;

            case 'monto':
                if (!Array.isArray(formData.montos) || !formData.montos.length) this.camposInvalidos.push('montos');
                if (!formData.fundamentoMonto) this.camposInvalidos.push('fundamentoMonto');
                return this.camposInvalidos.length === 0;

            case 'vigencia':
                if (!formData.vigencia) this.camposInvalidos.push('vigencia');
                if (!formData.fundamentoVigencia) this.camposInvalidos.push('fundamentoVigencia');
                return this.camposInvalidos.length === 0;

            case 'criterio':
                if (!formData.criterio) this.camposInvalidos.push('criterio');
                if (!formData.fundamentoCriterio) this.camposInvalidos.push('fundamentoCriterio');
                return this.camposInvalidos.length === 0;

            case 'unidad':
                if (!Array.isArray(formData.domicilios) || !formData.domicilios.length) this.camposInvalidos.push('domicilios');
                if (!Array.isArray(formData.horarios) || !formData.horarios.length) this.camposInvalidos.push('horarios');
                return this.camposInvalidos.length === 0;

            case 'otrosMedios':
                if (!Array.isArray(formData.telefonos) || !formData.telefonos.length) this.camposInvalidos.push('telefonos');
                if (!Array.isArray(formData.correos) || !formData.correos.length) this.camposInvalidos.push('correos');
                if (!Array.isArray(formData.sitiosWebs) || !formData.sitiosWebs.length) this.camposInvalidos.push('sitiosWebs');
                if (!formData.demasDatosRelativos) this.camposInvalidos.push('demasDatosRelativos');
                return this.camposInvalidos.length === 0;

            case 'informacion':
                if (!formData.informacion) this.camposInvalidos.push('informacion');
                if (!formData.fundamentoInformacion) this.camposInvalidos.push('fundamentoInformacion');
                return this.camposInvalidos.length === 0;

            case 'estrategia':
                if (!formData.tramiteEnLinea) this.camposInvalidos.push('tramiteEnLinea');
                if (!formData.cargarDocumentos) this.camposInvalidos.push('cargarDocumentos');
                if (!formData.seguimiento) this.camposInvalidos.push('seguimiento');
                if (!formData.informacionMedios) this.camposInvalidos.push('informacionMedios');
                if (!formData.respuestaResolucion) this.camposInvalidos.push('respuestaResolucion');
                if (!formData.utilizaFirma) this.camposInvalidos.push('utilizaFirma');
                if (!formData.realizarNotificaciones) this.camposInvalidos.push('realizarNotificaciones');
                if (!formData.demasInformacion) this.camposInvalidos.push('demasInformacion');
                return this.camposInvalidos.length === 0;

            default:
                return true;
        }
    },

    tieneError(nombreCampo) {
        return this.camposInvalidos.includes(nombreCampo);
    },

    limpiarCampoError(nombreCampo) {
        const formData = wire?.formData || {};
        const index = this.camposInvalidos.indexOf(nombreCampo);

        if (index !== -1) {
            const valor = formData[nombreCampo];

            if (
                (typeof valor === 'string' && valor.trim() !== '') ||
                (typeof valor === 'number' && valor !== null) ||
                (Array.isArray(valor) && valor.length > 0)
            ) {
                this.camposInvalidos.splice(index, 1);

                if (this.camposInvalidos.length === 0) {
                    this.tabsConError = this.tabsConError.filter(tab => tab !== this.tab);
                }
            }
        }
    },

    validarTodoFormulario() {
        this.camposInvalidos = [];
        this.tabsConError = [];
    
        let todoValido = true;
    
        for (const tab of this.tabs) {
            if (!this.validateTab(tab)) {
                todoValido = false;
                if (!this.tabsConError.includes(tab)) {
                    this.tabsConError.push(tab);
                }
            }
        }
    
        if (!todoValido) {
            this.errorMessage = 'Faltan datos obligatorios en algunos apartados.';
        }
    
        return todoValido;
    },
    
    async enviarFormularioAccion(accion = 'submit') {
        if (this.validarTodoFormulario()) {
            this.errorMessage = '';
    
            // Hacemos la acción en Livewire: submit o enviarRevision
            if (accion === 'submit') {
                await wire.submit();
            } else if (accion === 'enviarRevision') {
                await wire.enviarRevision();
            }
        } else {
            // Opcional: puedes hacer scroll automático hacia arriba
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    },
    
});
