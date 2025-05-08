// resources/js/unidad.js

export default (wire = null) => ({
    id_inmueble: '',
    piso: '',
    unidadAdministrativa: '',
    domicilios: wire ? wire.get('formData.domicilios') || [] : [],

    horarioAtencion: '',
    areaHorario: '',
    horarios: wire ? wire.get('formData.horarios') || [] : [],

    agregarDomicilio() {
        if (this.id_inmueble && this.piso && this.unidadAdministrativa) {
            this.domicilios.push({
                id_inmueble: this.id_inmueble, //   Guardamos el id para el insert
                nombre_inmueble: this.getInmueble(this.id_inmueble), //   También guardamos el nombre para mostrarlo bonito
                piso: this.piso,
                unidad: this.unidadAdministrativa,
            });
            this.sync();
            this.id_inmueble = '';
            this.piso = '';
            this.unidadAdministrativa = '';
        } else {
            alert('Completa todos los campos para agregar el domicilio.');
        }
    },

    eliminarDomicilio(index) {
        this.domicilios.splice(index, 1);
        this.sync();
    },

    agregarHorario() {
        if (this.horarioAtencion && this.areaHorario) {
            this.horarios.push({
                horario: this.horarioAtencion,
                area: this.areaHorario
            });
            this.sync();
            this.horarioAtencion = '';
            this.areaHorario = '';
        } else {
            alert('Completa todos los campos para agregar el horario.');
        }
    },

    eliminarHorario(index) {
        this.horarios.splice(index, 1);
        this.sync();
    },

    getInmueble(id) {
        const inmuebles = {
            '1': 'Inmueble Niños Héroes No. 119',
            '2': 'Inmueble Niños Héroes No. 132',
            '3': 'Inmueble Niños Héroes No. 150',
            '4': 'Inmueble Torre Norte',
            '5': 'Inmueble Torre Sur',
            '6': 'Inmueble Claudio Bernard',
            '7': 'Inmueble Instituto de Ciencias Forenses',
            '8': 'Inmueble Centro de Justicia alternativa',
            '9': 'Inmueble Patriotismo',
            '10': 'Inmueble Dr. Liceaga',
            '11': 'Inmueble Dr. Lavista',
            '12': 'Inmueble Clementina Gil de Léster',
            '13': 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero',
            '14': 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez',
            '15': 'Inmueble Centro de Desarrollo Infantil Niños Héroes',
            '16': 'Inmueble Archivo Delicias',
            '17': 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl',
            '18': 'Inmueble Archivo Dr. Navarro',
            '20': 'Inmueble Reclusorio Preventivo Norte',
            '21': 'Inmueble Reclusorio Preventivo Sur',
            '23': 'Inmueble Reclusorio Preventivo Oriente',
            '24': 'Inmueble Reclusorio Preventivo Santa Martha Acatitla',
            '25': 'Inmueble Plaza Juárez',
            '26': 'Inmueble Lerma',
        };
        return inmuebles[id] || 'Desconocido';
    },

    sync() {
        wire?.set('formData.domicilios', [...this.domicilios]);
        wire?.set('formData.horarios', [...this.horarios]);
    }
});
