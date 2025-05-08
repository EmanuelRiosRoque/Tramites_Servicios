export default (wire = null) => ({
    requisito: '',
    requisitos: wire ? [...(wire.get('formData.requisitos') || [])] : [],
    fundamentoRequisito: '',
    fundamentos: wire ? [...(wire.get('formData.fundamentos') || [])] : [],

    agregarRequisito() {
        if (this.requisito.trim() !== '') {
            this.requisitos.push(this.requisito.trim());
            wire?.set('formData.requisitos', [...this.requisitos]);
            this.requisito = '';
        }
    },

    eliminarRequisito(index) {
        this.requisitos.splice(index, 1);
        wire?.set('formData.requisitos', [...this.requisitos]);
    },

    agregarFundamentoRequisito() {
        if (this.fundamentoRequisito.trim() !== '') {
            this.fundamentos.push(this.fundamentoRequisito.trim());
            wire?.set('formData.fundamentos', [...this.fundamentos]);
            this.fundamentoRequisito = '';
        }
    },

    eliminarFundamento(index) {
        this.fundamentos.splice(index, 1);
        wire?.set('formData.fundamentos', [...this.fundamentos]);
    },

    sync() {
        wire?.set('formData.requisitos', [...this.requisitos]);
        wire?.set('formData.fundamentos', [...this.fundamentos]);
    }
});
