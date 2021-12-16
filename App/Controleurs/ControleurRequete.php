<?php
/**
 * @file Controleur qui sert à gérer les requetes simplifiées
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
use App\Modeles\Article;
use App\Modeles\Compte;
use App\Modeles\Livre;
use App\Modeles\Paiement;

class ControleurRequete
{
    public function __construct()
    {
        //vide
    }

    //Trouver Tout livre
    /*public function trouverToutLivre(){

        $livres = Livre::trouverTout();
        $livreEnvoyer = [];
        foreach ($livres as $livre) {
            $range = array('id'=>$livre->getId(), 'titre'=>$livre->getTitre());
            array_push($livreEnvoyer, $range);
        }
        header('Content-Type: application/json');
        echo json_encode($livreEnvoyer);
    }*/

    //Trouver adresse par tous les champs
    public function trouverAdresseParTousLesChamps(){
        $adresse = Adresse::trouverParTousLesChamps($_GET['adresse'], $_GET['ville'], intval($_GET['province_id']), $_GET['code_postal']);
        header('Content-Type: application/json');
        echo json_encode($adresse);
    }

    //Inserer une adresse en ajax
    public function insererAdresse() {
        if (Adresse::trouverParTousLesChamps($_GET['adresse'], $_GET['ville'], intval($_GET['province_id']), $_GET['code_postal']) === null) {
            $adresse = new Adresse();
            $adresse->setAdresse($_GET['adresse']);
            $adresse->setVille($_GET['ville']);
            $adresse->setProvinceId(intval($_GET['province_id']));
            $adresse->setCodePostal($_GET['code_postal']);
            $adresse->inserer();
        }
    }

    // Inserer article en JS
    public function insererLivre():void {
        if (Article::trouverParIdProduitIdPanier(intval($_GET['panier_id']), intval($_GET['produit_id'])) === null) {
            $monNouvelArticle = new Article();
            $monNouvelArticle->setProduitId(intval($_GET['produit_id']));
            $monNouvelArticle->setPanierId(intval($_GET['panier_id']));
            $monNouvelArticle->setQuantite(intval($_GET['quantite']));
            $monNouvelArticle->inserer();
        }
        else {
            $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_GET['panier_id']), intval($_GET['produit_id']));
            $quantite = $ancienArticle->getQuantite() + intval($_GET['quantite']) <= 10 ? $ancienArticle->getQuantite() + intval($_GET['quantite']) : 10 ;
            $ancienArticle->setQuantite($quantite);
            $ancienArticle->mettreAJour();
        }
    }

}
