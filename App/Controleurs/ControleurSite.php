<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Actualite;
use App\Modeles\Categorie;
use App\Modeles\Livre;

class ControleurSite
{

    public function __construct()
    {
    }

    public function accueil(): void {

        $nouveautes = Livre::trouverNouveautesHasard(3);
//        var_dump($nouveautes);
        $aparaitre = Livre::trouverAParaitreHasard(3);
        $actualites = Actualite::trouverTout();
//        var_dump($actualites);
        $tDonnees = array("titrePage"=>"Accueil", "classeMain"=>"accueil", "nouveautes"=>$nouveautes, "aparaitre"=>$aparaitre, "actualites"=>$actualites);
//        var_dump($tDonnees);
        echo App::getBlade()->run("accueil",$tDonnees);
    }

    public function erreur():void{
        $tDonnees = array("titrePage"=>"erreur 404");
        echo App::getBlade()->run("404", $tDonnees);
    }

}

