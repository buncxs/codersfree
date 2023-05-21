import './bootstrap';


import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// Ckeditor
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
window.ClassicEditor = ClassicEditor;

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
