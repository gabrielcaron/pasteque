<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Categorie;
use App\Modeles\Livre;

class ControleurLivre
{
    public function __construct()
    {
        //vide
    }

    public function index(): void
    {
        var_dump($_POST);
        $urlLivre = 'index.php?controleur=livre&action=index';

        $intIdCategorie=[];
        $nombrePage = 5;

        $trierPar = $_POST['trierPar'] ?? 'auteurs.nomA';
        $intNbLivreParPage = $_POST['nbLivreParPage'] ?? 9;
        $choixVue = $_POST['choixVue'] ?? 'vignette';
        $strIdPage = $_POST['id_page'] ?? 0;

        $categories = Categorie::trouverTout();
        for ($i=0;$i<count($categories);$i++) {
            if (isset($_POST['categoriesSelectionner'.$i])) $intIdCategorie[$i] = $_POST['categoriesSelectionner'.$i];
        }

        $enregistrementDepart = $intNbLivreParPage !== 'tous' ? $strIdPage*$intNbLivreParPage : 0;
        $intNbLivreParPage = $intNbLivreParPage === 'tous'? Livre::trouverNombreLivres():$intNbLivreParPage;
        $livres = $intIdCategorie === [] ? Livre::trouverTout() : Livre::trouverLivresParCategories($intIdCategorie, $trierPar, $enregistrementDepart, $intNbLivreParPage);
        $nombreLivre = Livre::trouverNombreLivres();


        $tDonnees = array("titrePage"=>"Les livres", "action"=>"index", "livres"=>$livres, "nombreLivre"=>$nombreLivre,
            "categories"=>$categories, "numeroPage"=>$strIdPage, "nombreTotalPages"=>$nombrePage, "urlPagination"=>$urlLivre,
            "categoriesSelectionner"=>$intIdCategorie, "choixVue"=>$choixVue, "intNbLivreParPage"=>$intNbLivreParPage, "trierPar"=>$trierPar);
        echo App::getBlade()->run("livres.index",$tDonnees);

    }

    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $tDonnees = array("titrePage"=>"Livre", "action"=>"fiche", "livre"=>$livre);
        echo App::getBlade()->run("livres.fiche",$tDonnees);
    }

}

