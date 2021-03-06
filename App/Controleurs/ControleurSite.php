<?php
/**
 * @file Controleur qui sert à gérer l'accueil et à propos
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
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
        echo App::getBlade()->run("accueil",$tDonnees);
    }

    //Page d'erreur
    public function erreur():void{
        $tDonnees = array("titrePage"=>"erreur 404");
        echo App::getBlade()->run("404", $tDonnees);
    }

}

