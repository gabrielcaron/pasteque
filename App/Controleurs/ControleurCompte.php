<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;

class ControleurCompte
{

    public function __construct()
    {
        //vide
    }

    //Creation de compte
    public function creation(): void
    {
        $tDonnees = array("titrePage"=>"creation", "action"=>"creation");
        echo App::getBlade()->run("comptes.compte",$tDonnees);
    }

    //Connexion au compte
    public function connexion():void
    {
        $tDonnees = array("titrePage"=>"connexion", "action"=>"connexion");
        echo App::getBlade()->run("comptes.compte",$tDonnees);
    }

}