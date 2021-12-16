<?php
/**
 * @file Controleur qui sert à gérer les auteurs
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Auteur;
use App\Modeles\Livre;

class ControleurAuteur
{
    public function __construct()
    {
        //vide
    }

    //Index des auteurs
    public function index(): void
    {
//        var_dump($_POST);
        //Url de base
        $urlAuteur = 'index.php?controleur=auteur&action=index';

        //Filtres et tris
        $trierPar = $_POST['trierPar'] ?? 'auteurs.nomA';
        $nbAuteursParPage = $_POST['nbAuteursParPage'] ?? '9';
        $choixVue = $_POST['choixVue'] ?? 'vignette';
        $strIdPage = $_POST['id_page'] ?? 0;

        //Pagination
        $nombreAuteurs = Auteur::trouverNombreAuteurs();
        $enregistrementDepart = $nbAuteursParPage !== 'tous' ? $strIdPage*$nbAuteursParPage : 0;
        $nbAuteursParPage = $nbAuteursParPage === 'tous' ? $nombreAuteurs : $nbAuteursParPage;
        $nombrePage = intval($nombreAuteurs / $nbAuteursParPage);

        $auteurs = Auteur::trouverTout($trierPar, intval($enregistrementDepart), intval($nbAuteursParPage));

        $tDonnees = array("titrePage"=>"Artistes", "classeBody"=>"artistes", "action"=>"index", "auteurs"=>$auteurs, "nombreAuteurs"=>$nombreAuteurs,
            "nombreTotalPages"=>$nombrePage, "choixVue"=>$choixVue, "urlPagination"=>$urlAuteur, "numeroPage"=>$strIdPage,
            "nbAuteursParPage"=>$nbAuteursParPage, "trierPar"=>$trierPar);
        echo App::getBlade()->run("artistes.index",$tDonnees);
    }

    //Fiche des auteurs
    public function fiche($auteurChoisi):void
    {
        $auteur = Auteur::trouverParId($auteurChoisi);
        $tDonnees = array("titrePage"=>"Artistes", "classeBody"=>"artiste", "action"=>"fiche", "auteur"=>$auteur);
        echo App::getBlade()->run("artistes.fiche",$tDonnees);
    }
}

