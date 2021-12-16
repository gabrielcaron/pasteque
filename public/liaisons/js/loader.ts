/**
 * @file Fichier js servant à la gestion du loader de page
 * @author @Nicolas Thibault <1635751@csfoy.ca>
 * @version 1.2.3
 */
let loader = document.getElementById("page-loader");


const enleverLoader = () => {
    loader.classList.add('c0');

}
enleverLoader();

window.setTimeout(enleverDisplay, 1500);

function enleverDisplay(){
    loader.style.display = 'none';
}