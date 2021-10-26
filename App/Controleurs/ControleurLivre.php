<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Categorie;
use App\Modeles\Livre;
use App\Modeles\Reconnaissance;

class ControleurLivre
{
    public function __construct()
    {
        //vide
    }

    public function index(): void
    {
        var_dump($_POST);
        $intIdCategorie=$_POST['categoriesSelectionner'];
        var_dump($intIdCategorie);
        $strIdPage=0;
        $intIdCategorie=1;
        $intNbLivreParPage=25;
        $nombrePage = 5;
        $urlLivre = 'index.php?controleur=livre&action=index';
        if (isset($_GET['nbLivreParPage'])==true) $intNbLivreParPage=$_GET['nbLivreParPage'];
        if (isset($_GET['id_page'])==true) $strIdPage=$_GET['id_page'];
        if (isset($_GET['categoriesSelectionner'])!=0) $intIdCategorie=$_GET['id_categorie'];
        $enregistrementDepart=$strIdPage*$intNbLivreParPage;
        $livres = $intIdCategorie === 0 ? Livre::trouverTout() : Livre::trouverLivresParCategories($intIdCategorie, $enregistrementDepart, $intNbLivreParPage);
        $categories = Categorie::trouverTout();
        $nombreLivre = Livre::trouverNombreLivres();
        $tDonnees = array("titrePage"=>"Les livres", "action"=>"index", "livres"=>$livres, "nombreLivre"=>$nombreLivre,
            "categories"=>$categories, "numeroPage"=>$strIdPage, "nombreTotalPages"=>$nombrePage, "urlPagination"=>$urlLivre, "categorieSelectionner"=>$intIdCategorie);
        //var_dump($intIdCategorie);
        echo App::getBlade()->run("livres.index",$tDonnees);

    }

    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $tDonnees = array("titrePage"=>"Livre", "action"=>"fiche", "livre"=>$livre);
        echo App::getBlade()->run("livres.fiche",$tDonnees);
    }

}

