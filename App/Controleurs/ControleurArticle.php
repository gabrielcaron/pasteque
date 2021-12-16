<?php
/**
 * @file Controleur qui sert à gérer les articles
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */


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

    //Inserer article en PHP
    public function inserer():void {
        if (Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['produit_id'])) === null) {
            $monNouvelArticle = new Article();
            $monNouvelArticle->setProduitId(intval($_POST['produit_id']));
            $monNouvelArticle->setPanierId(intval($_POST['panier_id']));
            $monNouvelArticle->setQuantite(intval($_POST['quantite']));
            $monNouvelArticle->inserer();
        }
        else {
            $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['produit_id']));
            $quantite = $ancienArticle->getQuantite() + intval($_POST['quantite']) <= 10 ? $ancienArticle->getQuantite() + intval($_POST['quantite']) : 10 ;
            $ancienArticle->setQuantite($quantite);
            $ancienArticle->mettreAJour();
        }
        header('Location: index.php?controleur=panier&action=panier');
        exit;

    }
}

