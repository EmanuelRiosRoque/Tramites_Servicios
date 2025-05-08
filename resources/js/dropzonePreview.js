export default function dropzonePreview(name, multiple = true, model = null) {
    return {
        files: [],
        dragging: false,

        init(input) {
            this.inputElement = input;
        },

        async handleFileChange(event) {
            const selectedFiles = Array.from(event.target.files);

            if (!multiple) {
                this.files = selectedFiles.slice(0, 1);
            } else {
                this.files = [...this.files, ...selectedFiles];
            }

            await this.syncModel();
        },

        async handleDrop(event) {
            const droppedFiles = Array.from(event.dataTransfer.files);

            if (!multiple) {
                this.files = droppedFiles.slice(0, 1);
            } else {
                this.files = [...this.files, ...droppedFiles];
            }

            await this.syncModel();
        },

        async removeFile(index) {
            this.files.splice(index, 1);
            await this.syncModel();
        },

        async syncModel() {
            if (model) {
                const base64Files = await Promise.all(
                    this.files.map(file => this.fileToBase64(file))
                );

                const mappedFiles = this.files.map((file, index) => ({
                    name: file.name,
                    type: file.type,
                    size: file.size,
                    lastModified: file.lastModified,
                    preview: URL.createObjectURL(file),
                    base64: base64Files[index],
                }));

                this.$wire.set(model, mappedFiles);
            }
        },

        async fileToBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    // Quitar la parte 'data:application/pdf;base64,' y dejar solo el Base64
                    const base64String = reader.result.split(',')[1];
                    resolve(base64String);
                };
                reader.onerror = error => reject(error);
            });
        }
        
    }
}
