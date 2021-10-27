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

        $trierPar = isset($_POST['trierPar'])===true ? $_POST['trierPar'] : 9;
        $ascOuDesc = str_ends_with($trierPar, 'A') ? 'ASC' : 'DESC';
        $trier = $ascOuDesc ==='ASC' ? str_replace('A', '', $trierPar) : str_replace('D', '', $trierPar);

        $intNbLivreParPage = isset($_POST['nbLivreParPage'])===true ? $_POST['nbLivreParPage'] : 9;
        $choixVue = isset($_POST['choixVue'])===true ? $_POST['choixVue'] : 'vignette';
        $strIdPage = isset($_POST['id_page'])===true ? $_POST['id_page'] : 0;
        $categories = Categorie::trouverTout();

        for ($i=0;$i<count($categories);$i++) {
            if (isset($_POST['categoriesSelectionner'.$i])===true) $intIdCategorie[$i] = $_POST['categoriesSelectionner'.$i];
        }
        var_dump($intNbLivreParPage);



        $enregistrementDepart = $intNbLivreParPage !== 'tous' ? $strIdPage*$intNbLivreParPage : 0;
        $livres = $intIdCategorie === [] ? Livre::trouverTout() : Livre::trouverLivresParCategories($intIdCategorie, $trier, $ascOuDesc, $enregistrementDepart, $intNbLivreParPage);
        //var_dump($livres);
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

