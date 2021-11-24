<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Commande;
use App\Modeles\Compte;
use App\Modeles\Province;


class ControleurStepLeft
{
    public function __construct()
    {
        //vide
    }

    //Débuter le formulaire step left de commandes
    public function debuterStepLeft():void{

        if (isset($_SESSION['connected']) === false || $_SESSION['connected'] === false){
            $tDonnees = array("titrePage"=>"creation", "classeBody"=>"creation", "action"=>"connexion");
            echo App::getBlade()->run("comptes.compte",$tDonnees);
        }
        else{
            $compte = Compte::trouverParCourriel($_SESSION['email']);
            $commande = $compte->getCommandesAssocies();
            $facturation = $compte->getCommandesAssocies();
            $provinces = Province::trouverTout();
            if($commande !== null){
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"premierCommande", "compte"=>$compte, "commande"=>$commande, "facturation"=>$facturation, "provinces"=>$provinces);
            }
            else{
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"plusieursCommandes", "compte"=>$compte, "commande"=>$commande, "facturation"=>$facturation, "provinces"=>$provinces);
            }
            echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
        }

    }
}