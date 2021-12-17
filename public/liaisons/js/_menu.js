/**
 * @file Un menu simple, responsive bâti en amélioration progressive.
 * @author @nicolasThibault <nicolasthibault@hotmail.ca>
 * @version 1.2.3
 *
 */

//*******************
// Déclaration d'objet(s)
//*******************

var menu = {
    lblMenuFerme: '<svg class="iconeSVG" width="49" height="33" viewBox="0 0 49 33" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<line y1="1.5" x2="49" y2="1.5" stroke="#0050AF" stroke-width="3"/>\n' +
        '<line y1="15.8478" x2="49" y2="15.8478" stroke="#0050AF" stroke-width="3"/>\n' +
        '<line y1="31.5" x2="49" y2="31.5" stroke="#0050AF" stroke-width="3"/>\n' +
        '</svg>\n<span class="menu__flexLibelleTexte">MENU</span>',
    lblMenuOuvert: '<svg class="iconeSVG" width="36" height="33" viewBox="0 0 36 33" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '<line x1="1.93934" y1="31.9393" x2="31.9393" y2="1.93934" stroke="#0050AF" stroke-width="3"/>\n' +
        '<line x1="4.06066" y1="1.93934" x2="34.0607" y2="31.9393" stroke="#0050AF" stroke-width="3"/>\n' +
        '</svg>\n<span class="menu__flexLibelleTexte">FERMER</span>',
    refBouton: null,
    refLibelle: null,
    refMenu: null,
    refEntete: null,

    configurerNav: function () {

        //********** Création du bouton du menu mobile

        // On sélectionne le menu dans le HTML
        this.refMenu = document.querySelector(".menu");
        this.refEntete = document.querySelector(".entete");

        // Création du bouton et du libellé
        this.refBouton = document.createElement("button");
        this.refLibelle = document.createElement("span");

        // On ajoute le libellé dans le bouton
        this.refBouton.appendChild(this.refLibelle);

        // On ajoute les classes au bouton et au libellé
        this.refBouton.className = 'menu__controle';
        this.refLibelle.className = 'menu__libelle';

        // On associe le texte du libellé à l'élément html
        this.refLibelle.innerHTML = this.lblMenuFerme;

        // Ajout du bouton dans l'entête de la page html
        this.refMenu.prepend(this.refBouton);

        // Ajout de l'écouteur d'événement sur le bouton du menu
        this.refBouton.addEventListener('click', function () {
            menu.ouvrirFermerNav();
        });

        //this.refBouton.addEventListener('click', this.ouvrirFermerNav.bind(this));
    },

    ouvrirFermerNav: function () {
        // On bascule la classe de fermeture du menu
        this.refEntete.classList.toggle("menu--ouvert"); // Pour baisser la page dans le flux lorsque le menu est ouvert
        this.refMenu.classList.toggle("menu--ferme");


        // On change le libellé du bouton selon l'état du menu
        if (this.refMenu.classList.contains("menu--ferme")) {
            this.refLibelle.innerHTML = this.lblMenuFerme;
        } else {
            this.refLibelle.innerHTML = this.lblMenuOuvert;
        }
    },
    activeMenuItem: function () {
        const urlParams = new URLSearchParams(window.location.search);
        const action = urlParams.get('action');
        const controleur = urlParams.get('controleur');
        if (controleur === 'site') {
            switch (action) {
                case 'accueil':
                    document.getElementById('accueil').classList.add('activeMenuItem');
                    break;
                case 'apropos':
                    document.getElementById('apropos').classList.add('activeMenuItem');
                    break;
            }
        } else if(document.getElementById(controleur) !== null) {
            document.getElementById(controleur).classList.add('activeMenuItem');
        }
    },
};


//*******************
// Écouteurs d'événements
//*******************

window.addEventListener('load', function () {
    menu.configurerNav();
});
window.addEventListener('load', function () {
    menu.activeMenuItem();
});
