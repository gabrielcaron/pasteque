/**
 * @file Fichier js servant à la gestion du loader de page
 * @author @Nicolas Thibault <1635751@csfoy.ca>
 * @version 1.2.3
 */
var loader = document.getElementById("page-loader");
var enleverLoader = function () {
    loader.classList.add('c0');
};
enleverLoader();
window.setTimeout(enleverDisplay, 1500);
function enleverDisplay() {
    loader.style.display = 'none';
}
