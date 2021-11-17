function evtSubmit(e) {
    //code
    e.preventDefault();
}
var page = {
    initialiser: function () {
        //document.getElementById('formTri').addEventListener('submit', evtSubmit);
        //document.getElementById('livresTrie').addEventListener('click', envoyerFormulaire);
    }
};
function envoyerFormulaire(numeroPage) {
    console.log('entre');
    //document.getElementById('id_page').value = numeroPage;
}
//*******************
// Écouteurs d'événements
//*******************
window.addEventListener('load', function () { page.initialiser(); });
