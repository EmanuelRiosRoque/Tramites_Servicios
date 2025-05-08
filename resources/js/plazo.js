export default (wire = null) => ({
    fundamentoPlazo: '',
    fundamentosPlazo: wire ? wire.get('formData.fundamentosPlazo') || [] : [],

    agregarfundamentoPlazo() {
        if (this.fundamentoPlazo.trim() !== '') {
            this.fundamentosPlazo.push(this.fundamentoPlazo.trim());
            wire?.set('formData.fundamentosPlazo', [...this.fundamentosPlazo]);
            this.fundamentoPlazo = '';
        }
    },

    eliminarfundamentoPlazo(index) {
        this.fundamentosPlazo.splice(index, 1);
        wire?.set('formData.fundamentosPlazo', [...this.fundamentosPlazo]);
    },

    sync() {
        wire?.set('formData.fundamentosPlazo', [...this.fundamentosPlazo]);
    }
});
