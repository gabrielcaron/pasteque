var page = {
    initialiser: function () {
        console.log(document.getElementsByClassName("enveloppe__liste"));
        //document.getElementsByClassName("enveloppe__liste").querySelector
        console.log();
    }
};
//*******************
// Écouteurs d'événements
//*******************
window.addEventListener('load', function () { page.initialiser(); });
