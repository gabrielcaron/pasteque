<?php
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Modeles\Article;

class ControleurArticle
{

    public function __construct()
    {
        //vide
    }

    public function inserer():void {
        var_dump($_POST);
        if (Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['produit_id'])) === false) {
            $nouvelleArticle = new Article();
            $nouvelleArticle->setProduitId(intval($_POST['produit_id']));
            $nouvelleArticle->setPanierId(intval($_POST['panier_id']));
            $nouvelleArticle->setQuantite(intval($_POST['quantite']));
            $nouvelleArticle->inserer();
        }
//        else {
//            $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['produit_id']));
//            $quantite = $ancienArticle->getQuantite() + intval($_POST['quantite']) <= 10 ? $ancienArticle->getQuantite() + intval($_POST['quantite']) : 10 ;
//            $ancienArticle->setQuantite($quantite);
//            $ancienArticle->mettreAJour();
//        }
        header('Location: index.php?controleur=panier&action=panier');
        exit;

    }


}

