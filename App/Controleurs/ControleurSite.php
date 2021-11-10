<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Actualite;
use App\Modeles\Categorie;
use App\Modeles\Evenement;
use App\Modeles\Livre;

class ControleurSite
{

    public function __construct()
    {
        //Vide
    }

    //Page d'accueil
    public function accueil(): void {

        $nouveautes = Livre::trouverNouveautesHasard(3);
        $aparaitre = Livre::trouverAParaitreHasard(3);
        $actualites = Actualite::trouverTout();
        $evenements = Evenement::trouverTout();
        $tDonnees = array("titrePage"=>"Accueil", "classeBody"=>"accueil", "nouveautes"=>$nouveautes, "aparaitre"=>$aparaitre, "actualites"=>$actualites, "evenements"=>$evenements);
//        var_dump($tDonnees);
        echo App::getBlade()->run("accueil",$tDonnees);
    }

    //Page d'erreur
    public function erreur():void{
        $tDonnees = array("titrePage"=>"erreur 404");
        echo App::getBlade()->run("404", $tDonnees);
    }

}

