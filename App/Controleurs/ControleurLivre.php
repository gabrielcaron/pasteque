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
        $livres = Livre::trouverTout();
        $categories = Categorie::trouverTout();
        $nombreLivre = Livre::trouverNombreLivres();
        $tDonnees = array("titrePage"=>"Les livres", "action"=>"index", "livres"=>$livres, "nombreLivre"=>$nombreLivre, "categories"=>$categories);
        echo App::getBlade()->run("livres.index",$tDonnees);

    }

    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $tDonnees = array("titrePage"=>"Livre", "action"=>"fiche", "livre"=>$livre);
        echo App::getBlade()->run("livres.fiche",$tDonnees);
    }

}

