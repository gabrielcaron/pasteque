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

        /**
         * TODO - Vérifier si la personne est connecter avec un compte valide et que le compte_id est valide dans le formulaire aussi
         */
        var_dump($_POST);


        $ancienLivraison = $_POST['livraison_id'] !== '' ? Adresse::trouverParId(intval($_POST['livraison_id'])) : new Adresse();
        $ancienFacturation = $_POST['facturation_id'] !== '' ? Adresse::trouverParId(intval($_POST['livraison_id'])) : new Adresse();
        $ancienPaiement = $_POST['paiement_id'] !== '' ? Paiement::trouverParId(intval($_POST['paiement_id'])) : new Paiement();

        if ($_POST['livraison_id'] === ''|| ($ancienLivraison->getAdresse() !== $_POST['livraison_adresse'] || $ancienLivraison->getVille() || $ancienLivraison->getProvinceId() || $ancienLivraison->getCodePostal())) {
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getAdresse() !== $_POST['livraison_adresse']) $ancienLivraison->setAdresse($_POST['livraison_adresse']);
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getVille() !== $_POST['livraison_ville']) $ancienLivraison->setVille($_POST['livraison_ville']);
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getProvinceId() !== $_POST['livraison_province']) $ancienLivraison->setProvinceId(intval($_POST['livraison_province']));
            if ($_POST['livraison_id'] === ''|| $ancienLivraison->getCodePostal() !== $_POST['livraison_codePostal']) $ancienLivraison->setCodePostal($_POST['livraison_codePostal']);
            $_POST['livraison_id'] === '' ? $ancienLivraison->inserer() : $ancienLivraison->mettreAJour();
        }

        if ($_POST['facturation_id'] === ''|| ($ancienFacturation->getAdresse() !== $_POST['facturation_id'] || $ancienFacturation->getVille() || $ancienFacturation->getProvinceId() || $ancienFacturation->getCodePostal())) {
            if ($_POST['facturation_id'] === ''|| $ancienFacturation->getAdresse() !== $_POST['facturation_adresse']) $ancienFacturation->setAdresse($_POST['facturation_adresse']);
            if ($_POST['facturation_id'] === ''|| $ancienFacturation->getVille() !== $_POST['facturation_ville']) $ancienFacturation->setVille($_POST['facturation_ville']);
            if ($_POST['facturation_id'] === ''|| $ancienFacturation->getProvinceId() !== $_POST['facturation_province']) $ancienFacturation->setProvinceId(intval($_POST['facturation_province']));
            if ($_POST['facturation_id'] === ''|| $ancienFacturation->getCodePostal() !== $_POST['facturation_codePostal']) $ancienFacturation->setCodePostal($_POST['facturation_codePostal']);
            $_POST['facturation_id'] === '' ? $ancienFacturation->inserer() : $ancienFacturation->mettreAJour();
        }

        if ($_POST['paiement_id'] === ''|| ($ancienPaiement->getTitulaire() !== $_POST['facturation_nomTitulaire'] || $ancienPaiement->getNumeroCarte() !== $_POST['facturation_numeroCarte'] || $ancienPaiement->getMoisExpiration() !== $_POST['facturation_moisExpiration'] || $ancienPaiement->getAnneeExpiration() !== $_POST['facturation_anneeExpiration']|| $ancienPaiement->getCvv() !== $_POST['facturation_cvv'])) {
            if ($_POST['paiement_id'] === ''|| $ancienPaiement->getTitulaire() !== $_POST['facturation_nomTitulaire']) $ancienPaiement->setTitulaire($_POST['facturation_nomTitulaire']);
            if ($_POST['paiement_id'] === ''|| $ancienPaiement->getNumeroCarte() !== $_POST['facturation_numeroCarte']) $ancienPaiement->setNumeroCarte(intval($_POST['facturation_numeroCarte']));
            if ($_POST['paiement_id'] === ''|| $ancienPaiement->getMoisExpiration() !== $_POST['facturation_moisExpiration']) $ancienPaiement->setMoisExpiration(intval($_POST['facturation_moisExpiration']));
            if ($_POST['paiement_id'] === ''|| $ancienPaiement->getAnneeExpiration() !== $_POST['facturation_anneeExpiration']) $ancienPaiement->setAnneeExpiration(intval($_POST['facturation_anneeExpiration']));
            if ($_POST['paiement_id'] === ''|| $ancienPaiement->getCvv() !== $_POST['facturation_cvv']) $ancienPaiement->setCvv(intval($_POST['facturation_cvv']));
            $_POST['paiement_id'] === '' ? $ancienPaiement->inserer() : $ancienPaiement->mettreAJour();
        }

        $idLivraison = $_POST['livraison_id'] !== '' ? intval($_POST['livraison_id']) : intval(Adresse::trouverParTousLesChamps($ancienLivraison->getAdresse(), $ancienLivraison->getVille(), $ancienLivraison->getProvinceId(), $ancienLivraison->getCodePostal()));
        $idFacturation = $_POST['facturation_id'] !== '' ? intval($_POST['facturation_id']) : intval(Adresse::trouverParTousLesChamps($ancienLivraison->getAdresse(), $ancienLivraison->getVille(), $ancienLivraison->getProvinceId(), $ancienLivraison->getCodePostal()));
        $idPaiement = $_POST['paiement_id'] !== '' ? intval($_POST['paiement_id']) : intval(Paiement::trouverParTousLesChamps($ancienPaiement->getTitulaire(), $ancienPaiement->getNumeroCarte(), $ancienPaiement->getMoisExpiration(), $ancienPaiement->getAnneeExpiration(), $ancienPaiement->getCvv()));

        $commande = new Commande();
        $commande->setLivraisonAdresseId($idLivraison);
        $commande->setFacturationAdresseId($idFacturation);
        $commande->setPaiementId($idPaiement);
        $commande->setCompteId(intval($_POST['compte_id']));
        $commande->setDateUnixCommande(time());
        $commande->inserer();


    }
}