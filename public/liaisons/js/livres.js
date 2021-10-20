var page = {
    initialiser: function () {
        console.log(document.getElementsByClassName("enveloppe__liste"));
        //document.getElementsByClassName("enveloppe__liste").querySelector
        console.log('salut');
    }
};
console.log('salut');
//*******************
// Écouteurs d'événements
//*******************
window.addEventListener('load', function () { page.initialiser(); });
