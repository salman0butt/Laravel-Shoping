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
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

