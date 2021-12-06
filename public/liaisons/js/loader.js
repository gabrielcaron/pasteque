"use strict";
var loader = document.getElementById("page-loader");
var enleverLoader = function () {
    loader.classList.add('c0');
};
enleverLoader();
window.setTimeout(enleverDisplay, 1500);
function enleverDisplay() {
    loader.style.display = 'none';
}
