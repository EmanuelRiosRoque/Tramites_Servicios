export default (wire = null) => ({
    paso: '',
    pasos: wire ? wire.get('formData.pasos') || [] : [],

    agregarPaso() {
        if (this.paso.trim() !== '') {
            this.pasos.push(this.paso.trim());
            wire?.set('formData.pasos', [...this.pasos]);
            this.paso = '';

        }
    },

    eliminarPaso(index) {
        this.pasos.splice(index, 1);
        wire?.set('formData.pasos', [...this.pasos]);
    },

    sync() {
        wire?.set('formData.pasos', [...this.pasos]);
    }
});
