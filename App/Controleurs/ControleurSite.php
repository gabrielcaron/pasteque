<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Categorie;
use App\Modeles\Livre;

class ControleurSite
{

    public function __construct()
    {
    }

    public function accueil(): void {
        $nouveautes = Livre::trouverNouveautesHasard(3);
        $aparaitre = Livre::trouverAParaitreHasard(3);
//        var_dump($nouveautes);
        $tDonnees = array("titrePage"=>"Accueil", "nouveautes"=>$nouveautes, "aparaitre"=>$aparaitre);
//        var_dump($tDonnees);
        echo App::getBlade()->run("accueil",$tDonnees);
    }

    public function erreur():void{
        $tDonnees = array("titrePage"=>"erreur 404");
        echo App::getBlade()->run("404", $tDonnees);
    }

}

