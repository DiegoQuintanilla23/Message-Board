import './bootstrap';

import Pusher from "pusher-js";

import Alpine from 'alpinejs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'; // CKEditor Classic Build

// Inicialización de CKEditor
document.addEventListener('DOMContentLoaded', function () {
    // Encuentra todos los elementos con el selector `ckeditor`
    document.querySelectorAll('.ckeditor').forEach((element) => {
        ClassicEditor
            .create(element, {
                toolbar: [
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'
                ], // Configuración personalizada de la barra de herramientas
                language: 'en', // Idioma
            })
            .catch(error => {
                console.error('Error al cargar CKEditor:', error);
            });
    });
});


window.Alpine = Alpine;

Alpine.start();

