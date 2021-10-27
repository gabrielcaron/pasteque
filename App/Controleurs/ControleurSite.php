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
        $tDonnees = array("titrePage"=>"Accueil", "nouveautes"=>$nouveautes);
//        var_dump($tDonnees);
        echo App::getBlade()->run("accueil",$tDonnees);
    }

    public function erreur():void{
        $tDonnees = array("titrePage"=>"erreur 404");
        echo App::getBlade()->run("404", $tDonnees);
    }
    public function entete(): void
    {
        echo "<h1>La Pastèque</h1>";
        echo '<a href="index.php?controleur=site&action=accueil">Accueil</a></br>';
        echo '<a href="index.php?controleur=livre&action=index">Livres</a></br>';
        echo '<a href="index.php?controleur=auteur&action=index">Auteurs</a></br>';
        echo '<a href="index.php?controleur=site&action=apropos">À propos</a></br>';
    }


}

