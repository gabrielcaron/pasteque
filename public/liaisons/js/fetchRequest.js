/**
 * @file Fichier js servant à la gestion des requetes
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
var request = {
    trouverToutLivre: function (controleur, action, id) {
        var test = null;
        this.fetchRequest(controleur, action, id).then(function (result) {
            console.log('avant');
            test = result;
            console.log(test);
        });
        console.log(test);
    },
    trouverToutCompte: function (controleur, action, id) {
        console.log('heyyyyyyyyyyyyyyy');
        var test = null;
        this.fetchRequest(controleur, action, id).then(function (result) {
            console.log('avant');
            test = result;
            console.log('apres');
        });
        console.log(test);
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
//document.getElementById('courriel').addEventListener('focusout', function () {request.trouverToutCompte('compte', 'trouverTout', '')});
document.getElementById('testRequest').addEventListener('click', function () { request.trouverToutLivre('livre', 'trouverTout', ''); });
