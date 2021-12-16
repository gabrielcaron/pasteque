<?php
/**
 * @file Controleur qui sert à gérer le stepleft
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Adresse;
use App\Modeles\Commande;
use App\Modeles\Compte;
use App\Modeles\Paiement;
use App\Modeles\Panier;
use App\Modeles\Province;
use App\Utilitaires\ValiderChampsFormulaire;


class ControleurStepLeft
{
    public function __construct()
    {
        //vide
    }

    //Débuter le formulaire step left de commandes
    public function debuterStepLeft():void{

        if (isset($_SESSION['connected']) === false || $_SESSION['connected'] === false){
            header('Location: index.php?controleur=compte&action=connexion');
        }
        else{
            $tValidation = $_SESSION['tValidation'] ?? null;
            unset($_SESSION['tValidation']);
            var_dump($tValidation);
            $panier = Panier::trouverParIdSession(session_id());
            $articles = $panier->getArticlesAssocies();
            $prixTotal = 0;
            $nombreArticles = 0;
            foreach ($articles as $article) {
                $nombreArticles += $article->getQuantite();
                $prixTotal += $article->getQuantite() * $article->getLivreAssocie()->getPrixCan();
            }
            $prixLivraison = $prixTotal > 60 ? 0 : 7;

            $compte = Compte::trouverParCourriel($_SESSION['email']);
            $commande = $compte->getCommandesAssocies() ?? null;
            $provinces = Province::trouverTout();
            $livraison = $commande !== null && $commande->getLivraisonAdresseAssocie() !== null ? $commande->getLivraisonAdresseAssocie() : null;
            $facturation = $commande !== null && $commande->getFacturationAdresseAssocie() !==null ? $commande->getFacturationAdresseAssocie() : null;
            $paiement = $commande !== null && $commande->getPaiementAssocie() !== null ? $commande->getPaiementAssocie() : null;
            if($commande !== null){

                $toutesFacturationsId = Commande::trouverToutAdresseFacturation($compte->getId());
                $tableauReduitFacturationId = [];
                for ($i = 0; $i < count($toutesFacturationsId); $i++) {
                    $tableauReduitFacturationId[$i] = $toutesFacturationsId[$i]->facturation_adresse_id;
                }
                $facturationToutesLesAdresses = Adresse::trouverToutParTableauId($tableauReduitFacturationId);

                $livraisonToutesLesAdresses = Adresse::trouverToutAdresseParIdCompte($compte->getId(),'commandes.livraison_adresse_id');
                //var_dump($livraisonToutesLesAdresses[0]->getId());

                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"premierCommande", "compte"=>$compte,
                    "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "paiement"=>$paiement, "provinces"=>$provinces,
                    "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles, "livraisonToutesLesAdresses"=>$livraisonToutesLesAdresses,
                    "facturationToutesLesAdresses"=>$facturationToutesLesAdresses, "prixLivraison" => $prixLivraison, "tValidation"=>$tValidation);
            }
            else{
                $livraisonToutesLesAdresses = null;
                $facturationToutesLesAdresses = null;
                $tDonnees = array("titrePage"=>"commande", "classeBody"=>"commande", "action"=>"plusieursCommandes", "compte"=>$compte,
                    "commande"=>$commande,"livraison"=>$livraison, "facturation"=>$facturation, "paiement"=>$paiement, "provinces"=>$provinces,
                    "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles, "livraisonToutesLesAdresses"=>$livraisonToutesLesAdresses,
                    "facturationToutesLesAdresses"=>$facturationToutesLesAdresses, "prixLivraison" => $prixLivraison, "tValidation"=>$tValidation);
            }
           echo App::getBlade()->run("paniers.formulaireCommande",$tDonnees);
        }
    }

    public function inserer():void {

        /**
         * TODO - Vérifier si la personne est connecter avec un compte valide et que le compte_id est valide dans le formulaire aussi
         * TODO - Mettre à jour et insérer adresse dans requête fetch
         * TODO - Validation serveur
         */
        // Récupérer le contenu des messages en format JSON
        $contenuBruteFichierJsonStepLeftCombiner = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesStepLeftCombiner.json");
        // Convertir en tableau associatif
        $tMessagesJsonStepLeftCombiner = json_decode($contenuBruteFichierJsonStepLeftCombiner, true);
        $tDonnes = ValiderChampsFormulaire::validerFormulaire($tMessagesJsonStepLeftCombiner);

        $tableauErreur = ValiderChampsFormulaire::verifierErreurFormulaire($tDonnes);

        if(in_array(false, $tableauErreur)){
            $_SESSION['tValidation'] = $tDonnes;
            header('Location: index.php?controleur=stepLeft&action=debuterStepLeft');
        }
        else {
            $ancienLivraison = $_POST['livraison_id'] !== '' ? Adresse::trouverParId(intval($_POST['livraison_id'])) : new Adresse();
            $ancienFacturation = $_POST['facturation_id'] !== '' ? Adresse::trouverParId(intval($_POST['facturation_id'])) : new Adresse();
            $ancienPaiement = $_POST['paiement_id'] !== '' ? Paiement::trouverParId(intval($_POST['paiement_id'])) : new Paiement();

            if ($_POST['livraison_id'] === ''|| ($ancienLivraison->getAdresse() !== $_POST['livraison_adresse'] || $ancienLivraison->getVille() || $ancienLivraison->getProvinceId() || $ancienLivraison->getCodePostal())) {
                if ($_POST['livraison_id'] === ''|| $ancienLivraison->getAdresse() !== $_POST['livraison_adresse']) $ancienLivraison->setAdresse($_POST['livraison_adresse']);
                if ($_POST['livraison_id'] === ''|| $ancienLivraison->getVille() !== $_POST['livraison_ville']) $ancienLivraison->setVille($_POST['livraison_ville']);
                if ($_POST['livraison_id'] === ''|| $ancienLivraison->getProvinceId() !== $_POST['livraison_province']) $ancienLivraison->setProvinceId(intval($_POST['livraison_province']));
                if ($_POST['livraison_id'] === ''|| $ancienLivraison->getCodePostal() !== $_POST['livraison_codePostal']) $ancienLivraison->setCodePostal($_POST['livraison_codePostal']);
                if($_POST['livraison_id'] !== '' && $_POST['livraison_id'] !== $_POST['facturation_id']) $ancienLivraison->mettreAJour();
                else $_POST['livraison_adresse'] === $_POST['facturation_adresse'] && $_POST['livraison_ville'] === $_POST['facturation_ville'] && $_POST['livraison_province'] === $_POST['facturation_province'] && $_POST['livraison_codePostal'] === $_POST['facturation_codePostal'] ? $ancienLivraison->mettreAJour() : $ancienLivraison->inserer();
            }

            if ($_POST['facturation_id'] === ''|| ($ancienFacturation->getAdresse() !== $_POST['facturation_id'] || $ancienFacturation->getVille() || $ancienFacturation->getProvinceId() || $ancienFacturation->getCodePostal())) {
                if ($_POST['facturation_id'] === ''|| $ancienFacturation->getAdresse() !== $_POST['facturation_adresse']) $ancienFacturation->setAdresse($_POST['facturation_adresse']);
                if ($_POST['facturation_id'] === ''|| $ancienFacturation->getVille() !== $_POST['facturation_ville']) $ancienFacturation->setVille($_POST['facturation_ville']);
                if ($_POST['facturation_id'] === ''|| $ancienFacturation->getProvinceId() !== $_POST['facturation_province']) $ancienFacturation->setProvinceId(intval($_POST['facturation_province']));
                if ($_POST['facturation_id'] === ''|| $ancienFacturation->getCodePostal() !== $_POST['facturation_codePostal']) $ancienFacturation->setCodePostal($_POST['facturation_codePostal']);
                if($_POST['facturation_id'] !== '' && $_POST['livraison_id'] !== $_POST['facturation_id']) $ancienFacturation->mettreAJour();
                else $_POST['livraison_adresse'] === $_POST['facturation_adresse'] && $_POST['livraison_ville'] === $_POST['facturation_ville'] && $_POST['livraison_province'] === $_POST['facturation_province'] && $_POST['livraison_codePostal'] === $_POST['facturation_codePostal'] ? $ancienFacturation->mettreAJour() : $ancienFacturation->inserer();
            }

            if ($_POST['paiement_id'] === ''|| ($ancienPaiement->getTitulaire() !== $_POST['facturation_nomTitulaire'] || $ancienPaiement->getNumeroCarte() !== $_POST['facturation_numeroCarte'] || $ancienPaiement->getMoisExpiration() !== $_POST['facturation_moisExpiration'] || $ancienPaiement->getAnneeExpiration() !== $_POST['facturation_anneeExpiration']|| $ancienPaiement->getCvv() !== $_POST['facturation_cvv'])) {
                if ($_POST['paiement_id'] === ''|| $ancienPaiement->getTitulaire() !== $_POST['facturation_nomTitulaire']) $ancienPaiement->setTitulaire($_POST['facturation_nomTitulaire']);
                if ($_POST['paiement_id'] === ''|| $ancienPaiement->getNumeroCarte() !== $_POST['facturation_numeroCarte']) $ancienPaiement->setNumeroCarte(intval($_POST['facturation_numeroCarte']));
                if ($_POST['paiement_id'] === ''|| $ancienPaiement->getMoisExpiration() !== $_POST['facturation_moisExpiration']) $ancienPaiement->setMoisExpiration(intval($_POST['facturation_moisExpiration']));
                if ($_POST['paiement_id'] === ''|| $ancienPaiement->getAnneeExpiration() !== $_POST['facturation_anneeExpiration']) $ancienPaiement->setAnneeExpiration(intval($_POST['facturation_anneeExpiration']));
                if ($_POST['paiement_id'] === ''|| $ancienPaiement->getCvv() !== $_POST['facturation_cvv']) $ancienPaiement->setCvv(intval($_POST['facturation_cvv']));
                $_POST['paiement_id'] === '' ? $ancienPaiement->inserer() : $ancienPaiement->mettreAJour();
            }

            $commande = new Commande();
            $commande->setLivraisonAdresseId(intval(Adresse::trouverParTousLesChamps($ancienLivraison->getAdresse(), $ancienLivraison->getVille(), $ancienLivraison->getProvinceId(), $ancienLivraison->getCodePostal())));
            $commande->setFacturationAdresseId(intval(Adresse::trouverParTousLesChamps($ancienFacturation->getAdresse(), $ancienFacturation->getVille(), $ancienFacturation->getProvinceId(), $ancienFacturation->getCodePostal())));
            $commande->setPaiementId(intval(Paiement::trouverParTousLesChamps($ancienPaiement->getTitulaire(), $ancienPaiement->getNumeroCarte(), $ancienPaiement->getMoisExpiration(), $ancienPaiement->getAnneeExpiration(), $ancienPaiement->getCvv())));
            $commande->setCompteId(intval($_POST['compte_id']));
            $commande->setDateUnixCommande(time());
            $commande->inserer();


            session_regenerate_id();


            $nouveauPanier =  new Panier;
            $nouveauPanier->setIdSession(session_id());
            $nouveauPanier->setDateUnix(time());
            $nouveauPanier->inserer();

            $panier = Panier::trouverParIdSession(session_id());
            $compteModifierPanier = Compte::trouverParId(intval($_POST['compte_id']));
            $compteModifierPanier->setPanierId($panier->getId());
            $compteModifierPanier->mettreAJour();

            header('Location: index.php?controleur=panier&action=confirmation');
        }

    }
}
