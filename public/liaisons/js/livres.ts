/**
 * @file Fichier js servant à la gestion des filtres
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @version 1.2.3
 *
 */
/*let requestLivre = {
    async trouverToutLivre(classe, action, id) {
        let test = null;
        let response = await fetch('index.php?controleur=requete&classe=' + classe + '&action=' + action + '&id=' + id)
            .then(response => {
                return response.json();
            })
            .catch(function (error) {
                console.log(error);
            });
        console.log(response)
        return response
    },
}*/

function gererFiltres(btnFiltre) {
    let dvFiltre = document.getElementById("formTri");
    if (btnFiltre.value === "Yes") {
        dvFiltre.style.display = "block";
        btnFiltre.value = "No";
    } else {
        dvFiltre.style.display = "none";
        btnFiltre.value = "Yes";
    }
}
//*******************
// Écouteurs d'événements
//*******************
//document.getElementById('courriel').addEventListener('focusout', function () {request.trouverToutCompte('compte', 'trouverTout', '')});
//document.getElementById('testRequest').addEventListener('click', function () {requestLivre.trouverToutLivre('livre', 'trouverTout', '')});