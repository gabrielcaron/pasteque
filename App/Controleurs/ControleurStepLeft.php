<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Commande;
use App\Modeles\Compte;
use App\Modeles\Panier;
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
            $panier = Panier::trouverParIdSession(session_id());
            $articles = $panier->getArticlesAssocies();

            $prixTotal = 0;
            $nombreArticles = 0;
            foreach ($articles as $article) {
                $nombreArticles += $article->getQuantite();
                $prixTotal += $article->getQuantite() * $article->getLivreAssocie()->getPrixCan();
            }


            $compte = Compte::trouverParCourriel($_SESSION['email']);
            $commande = $compte->getCommandesAssocies();
            $provinces = Province::trouverTout();
            if($commande !== null){
                $livraison = $commande->getLivraisonAdresseAssocie();
                $facturation = $commande->getFacturationAdresseAssocie();
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"premierCommande", "compte"=>$compte, "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "provinces"=>$provinces, "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
            }
            else{
                $livraison = null;
                $facturation = null;
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"plusieursCommandes", "compte"=>$compte, "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "provinces"=>$provinces, "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
            }
            echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
        }

    }
}