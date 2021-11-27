<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Adresse;
use App\Modeles\Commande;
use App\Modeles\Compte;
use App\Modeles\Paiement;
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
                $paiement = $commande->getPaiementAssocie();
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"premierCommande", "compte"=>$compte, "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "paiement"=>$paiement, "provinces"=>$provinces, "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
            }
            else{
                $livraison = null;
                $facturation = null;
                $paiement = null;
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"plusieursCommandes", "compte"=>$compte, "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "paiement"=>$paiement, "provinces"=>$provinces, "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
            }
            echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
        }
    }

    public function inserer():void {

        var_dump($_POST);

        $ancienCommande = $_POST['commande_id'] !== '' ? Commande::trouverParId(intval($_POST['commande_id'])) : null;
        $ancienLivraison = $_POST['livraison_id'] !== '' ? Adresse::trouverParId(intval($_POST['livraison_id'])) : new Adresse();
        $ancienFacturation = $_POST['facturation_id'] !== '' ? Adresse::trouverParId(intval($_POST['livraison_id'])) : new Adresse();
        $ancienPaiement = $_POST['paiement_id'] !== '' ? Paiement::trouverParId(intval($_POST['paiement_id'])) : null;

        if ($_POST['livraison_id'] === ''|| ($ancienLivraison->getAdresse() !== $_POST['livraison_adresse'] || $ancienLivraison->getVille() || $ancienLivraison->getProvinceId() || $ancienLivraison->getCodePostal())) {
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getAdresse() !== $_POST['livraison_adresse']) $ancienLivraison->setAdresse($_POST['livraison_adresse']);
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getVille() !== $_POST['livraison_ville']) $ancienLivraison->setVille($_POST['livraison_ville']);
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getProvinceId() !== $_POST['livraison_province']) $ancienLivraison->setProvinceId(intval($_POST['livraison_province']));
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getCodePostal() !== $_POST['livraison_codePostal']) $ancienLivraison->setCodePostal($_POST['livraison_codePostal']);
            $_POST['livraison_id'] === '' ? $ancienLivraison->inserer() : $ancienLivraison->mettreAJour();
        }

        if ($_POST['facturation_id'] === ''|| ($ancienFacturation->getAdresse() !== $_POST['facturation_id'] || $ancienFacturation->getVille() || $ancienFacturation->getProvinceId() || $ancienFacturation->getCodePostal())) {
            if ($_POST['facturation_adresse'] === ''|| $ancienFacturation->getAdresse() !== $_POST['facturation_adresse']) $ancienFacturation->setAdresse($_POST['facturation_adresse']);
            if ($_POST['facturation_ville'] === ''|| $ancienFacturation->getVille() !== $_POST['facturation_ville']) $ancienFacturation->setVille($_POST['facturation_ville']);
            if ($_POST['facturation_province'] === ''|| $ancienFacturation->getProvinceId() !== $_POST['facturation_province']) $ancienFacturation->setProvinceId(intval($_POST['facturation_province']));
            if ($_POST['facturation_codePostal'] === ''|| $ancienFacturation->getCodePostal() !== $_POST['facturation_codePostal']) $ancienFacturation->setCodePostal($_POST['facturation_codePostal']);
            $_POST['facturation_id'] === '' ? $ancienFacturation->inserer() : $ancienFacturation->mettreAJour();
        }





    }
}