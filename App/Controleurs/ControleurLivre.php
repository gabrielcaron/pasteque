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

        $intNbLivreParPage = isset($_POST['nbLivreParPage'])===true ? $_POST['nbLivreParPage'] : 9;
        $choixVue = isset($_POST['choixVue'])===true ? $_POST['choixVue'] : 'vignette';
        $strIdPage = isset($_POST['id_page'])===true ? $_POST['id_page'] : 0;
        $categories = Categorie::trouverTout();

        for ($i=0;$i<count($categories);$i++) {
            if (isset($_POST['categoriesSelectionner'.$i])===true) $intIdCategorie[$i] = $_POST['categoriesSelectionner'.$i];
        }
        var_dump($intIdCategorie);



        $enregistrementDepart=$strIdPage*$intNbLivreParPage;
        $livres = $intIdCategorie === [] ? Livre::trouverTout() : Livre::trouverLivresParCategories($intIdCategorie, $enregistrementDepart, $intNbLivreParPage);

        $nombreLivre = Livre::trouverNombreLivres();


        $tDonnees = array("titrePage"=>"Les livres", "action"=>"index", "livres"=>$livres, "nombreLivre"=>$nombreLivre,
            "categories"=>$categories, "numeroPage"=>$strIdPage, "nombreTotalPages"=>$nombrePage, "urlPagination"=>$urlLivre,
            "categoriesSelectionner"=>$intIdCategorie, "choixVue"=>$choixVue, "intNbLivreParPage"=>$intNbLivreParPage);
        echo App::getBlade()->run("livres.index",$tDonnees);

    }

    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $tDonnees = array("titrePage"=>"Livre", "action"=>"fiche", "livre"=>$livre);
        echo App::getBlade()->run("livres.fiche",$tDonnees);
    }

}

