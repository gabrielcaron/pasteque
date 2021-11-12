<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;

class ControleurPanier
{

    public function __construct()
    {
        //vide
    }

    //Connexion au compte
    public function panier():void
    {
        $tDonnees = array("titrePage"=>"Mon panier", "action"=>"panier");
        echo App::getBlade()->run("paniers.panier",$tDonnees);
    }

}