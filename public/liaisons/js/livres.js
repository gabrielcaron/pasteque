/**
 * @file Fichier js servant à la gestion des filtres
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @version 1.2.3
 *
 */
function gererFiltres(btnFiltre) {
    var dvFiltre = document.getElementById("formTri");
    console.log(btnFiltre.value);
    if (btnFiltre.value === "Yes") {
        dvFiltre.style.display = "block";
        btnFiltre.value = "No";
    }
    else {
        dvFiltre.style.display = "none";
        btnFiltre.value = "Yes";
    }
}
