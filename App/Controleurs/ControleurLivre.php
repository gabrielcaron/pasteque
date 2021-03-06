<?php
/**
 * @file Controleur qui sert à gérer les livres
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Categorie;
use App\Modeles\Livre;
use App\Modeles\Panier;

class ControleurLivre
{
    public function __construct()
    {
        //vide
    }

    //Index des livres
    public function index(): void
    {
        //Url de base
        $urlLivre = 'index.php?controleur=livre&action=index';

        //Filtres et tris
        $trierPar = $_POST['trierPar'] ?? 'auteurs.nomA';
        $intNbLivreParPage = $_POST['nbLivreParPage'] ?? '9';
        $choixVue = $_POST['choixVue'] ?? 'vignette';
        $strIdPage = $_POST['id_page'] ?? 0;
        $categories = Categorie::trouverTout();
        $intIdCategorie=[];
        for ($i=0;$i<count($categories);$i++) {
            if (isset($_POST['categoriesSelectionner'.$i])) $intIdCategorie[$i] = $_POST['categoriesSelectionner'.$i];
        }

        //Pagination
        $nombreLivre = $intIdCategorie === [] ? Livre::trouverNombreLivres() : Livre::trouverNombreLivresAvecCategories($intIdCategorie);
        $enregistrementDepart = $intNbLivreParPage !== 'tous' ? $strIdPage*$intNbLivreParPage : 0;
        if ($intNbLivreParPage === 'tous') $intNbLivreParPage = $nombreLivre !== Livre::trouverNombreLivres() ? Livre::trouverNombreLivresAvecCategories($intIdCategorie) : $nombreLivre;
        $nombrePage = intval($nombreLivre / $intNbLivreParPage);

        //Livres à afficher
        $livres = $intIdCategorie === [] ? Livre::trouverToutSansCategories($trierPar, intval($enregistrementDepart), intval($intNbLivreParPage)) : Livre::trouverLivresParCategories($intIdCategorie, $trierPar, intval($enregistrementDepart), intval($intNbLivreParPage));

        //Tableau des données à passer à la vue
        $tDonnees = array("titrePage"=>"Livres", "classeBody"=>"livres", "action"=>"index", "livres"=>$livres, "nombreLivre"=>$nombreLivre,
            "categories"=>$categories, "numeroPage"=>$strIdPage, "nombreTotalPages"=>$nombrePage, "urlPagination"=>$urlLivre,
            "categoriesSelectionner"=>$intIdCategorie, "choixVue"=>$choixVue, "intNbLivreParPage"=>$intNbLivreParPage, "trierPar"=>$trierPar);
        echo App::getBlade()->run("livres.index",$tDonnees);
    }

    //Fiche des livres
    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $panier = Panier::trouverParIdSession(session_id());
        $tDonnees = array("titrePage"=>"Livre", "action"=>"fiche", "livre"=>$livre, "panier"=>$panier);
        echo App::getBlade()->run("livres.fiche",$tDonnees);
    }

}

