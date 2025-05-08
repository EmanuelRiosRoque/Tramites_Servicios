import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js'; // 👈
import 'animate.css';
import unidad from './unidad';
import pasos from './pasos';
import requisitos from './requisitos';
import dropzonePreview from './dropzonePreview';
import monto from './monto';
import plazo from './plazo';
import otrosMedios from './otrosMedios';
import validaciones from './validaciones';

Alpine.data('unidad', unidad);
Alpine.data('pasos', pasos);
Alpine.data('requisitos', requisitos);   
Alpine.data('dropzonePreview', dropzonePreview);   
Alpine.data('monto', monto);   
Alpine.data('plazo', plazo);   
Alpine.data('otrosMedios', otrosMedios);   
Alpine.data('validaciones', validaciones);   


