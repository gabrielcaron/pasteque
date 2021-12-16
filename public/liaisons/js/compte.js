/**
 * @file Fichier js servant à la gestion des requetes pour le compte
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @author @Nicolas Thibault <1635751@csfoy.ca>
 * @version 1.2.3
 *
 */
var compte = {
    /**
     * Function pour trouver tout d'un compte
     * @param {string} controleur
     * @param {string} action
     * @param {string} id
     */
    trouverToutCompte: function (controleur, action, id) {
        var test = null;
        this.fetchRequest(controleur, action, id).then(function (result) {
            test = result;
        });
    },
    fetchRequest: function (controleur, action, id) {
        return fetch('request.php?controleur=' + controleur + '&action=' + action + '&id=' + id)
            .then(function (response) {
            return response.json();
        })
            .catch(function (error) {
            console.log(error);
        });
    }
};
//*******************
// Écouteurs d'événements
//*******************
document.getElementById('courriel').addEventListener('focusout', function () { compte.trouverToutCompte('compte', 'trouverTout', ''); });
//document.getElementById('testRequest').addEventListener('click', function () {request.trouverToutLivre('livre', 'trouverTout', '')});
