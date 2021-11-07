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
  lblMenuFerme: '<img src="liaisons/images/menuicone.png">',
  lblMenuOuvert: '<div class="menu__flex"><span>X</span><span class="menu__flexFerme">FERMER</span></div>',
  refBouton: null,
  refLibelle: null,
  refMenu: null,

  configurerNav: function ()
  {

    //********** Création du bouton du menu mobile

    // On sélectionne le menu dans le HTML
    this.refMenu = document.querySelector(".menu");

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
    console.log("configurerNav")

    //this.refBouton.addEventListener('click', this.ouvrirFermerNav.bind(this));
  },

  ouvrirFermerNav: function ()
  {
    // On bascule la classe de fermeture du menu
    this.refMenu.classList.toggle("menu--ferme");

    // On change le libellé du bouton selon l'état du menu
    // On change le libellé du bouton selon l'état du menu
    if (this.refMenu.classList.contains("menu--ferme"))
    {
      this.refLibelle.innerHTML = this.lblMenuFerme;
      console.log('hey')
    }
    else
    {
      this.refLibelle.innerHTML = this.lblMenuOuvert;
    }
  },
  activeMenuItem: function (){
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('controleur');

    document.getElementById(myParam).classList.add('activeMenuItem');
  },
};


//*******************
// Écouteurs d'événements
//*******************

window.addEventListener('load', function () { menu.configurerNav(); });
window.addEventListener('load', function (){menu.activeMenuItem();});
