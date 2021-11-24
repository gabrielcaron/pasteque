<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Commande;
use App\Modeles\Compte;


class ControleurStepLeft
{
    public function __construct()
    {
        //vide
    }

    public function debuterStepLeft():void{

        if (isset($_SESSION['connected']) === false || $_SESSION['connected'] === false){
            $tDonnees = array("titrePage"=>"creation", "classeBody"=>"creation", "action"=>"connexion");
            echo App::getBlade()->run("comptes.compte",$tDonnees);
        }
        else{
            $compte = Compte::trouverParCourriel($_SESSION['email']);
var_dump($compte->getCommandesAssocies());
            if(count($compte->getCommandesAssocies()) > 0){
                echo 'jai plusieurs commandes';
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"premierCommande");
                echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
            }
            else{
                echo 'je suis connecte et jai jamais commander';
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"plusieursCommandes");
                echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
            }
        }

    }
}