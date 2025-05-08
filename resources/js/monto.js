export default (wire = null) => ({
    monto: '',
    montos: wire ? wire.get('formData.montos') || [] : [],

    agregarMonto() {
        if (this.monto.trim() !== '') {
            this.montos.push(this.monto.trim());
            wire?.set('formData.montos', [...this.montos]);
            this.monto = '';
        }
    },

    eliminarMonto(index) {
        this.montos.splice(index, 1);
        wire?.set('formData.montos', [...this.montos]);
    },

    sync() {
        wire?.set('formData.montos', [...this.montos]);
    }
});
