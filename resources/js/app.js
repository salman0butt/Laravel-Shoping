/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
require('./bootstrap');
const feather = require('feather-icons');
feather.replace();
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
window.slugify = function (text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')      // Replace Spaces With -
        .replace(/[^\w\-]+/g, '')  // Remove All non-word Chars
        .replace(/\-\-+/g, '-')     // Replace multiple - with Single -
        .replace(/^-+/, '')         // Trim - From Start of text
        .replace(/-+$/, '')         // Trim From the end of text
}

