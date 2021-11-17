<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Article;

class ControleurPanier
{

    public function __construct()
    {
        //vide
    }

    //Connexion au compte
    public function panier():void
    {
        $tDonnees = array("titrePage"=>"Mon panier", "action"=>"panier");
        echo App::getBlade()->run("paniers.panier",$tDonnees);
    }

    public function modifier():void
    {
        $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['produit_id']));
        $ancienArticle->setQuantite(intval($_POST['quantite']));
        $ancienArticle->mettreAJour();
        header('Location: index.php?controleur=panier&action=fiche');
    }

    public function supprimer():void
    {
        $ancienArticle = Article::trouverParId(intval($_POST['id']));
        $ancienArticle->supprimer();
        header('Location: index.php?controleur=panier&action=fiche');
    }

}