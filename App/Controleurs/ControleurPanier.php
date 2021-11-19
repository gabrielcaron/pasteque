<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Article;
use App\Modeles\Panier;

class ControleurPanier
{

    public function __construct()
    {
        //vide
    }

    //Connexion au compte
    public function panier():void
    {
        $panier = Panier::trouverParIdSession(session_id());
        $articles = $panier->getArticlesAssocies();

        $prixTotal = 0;
        $nombreArticles = 0;
        foreach ($articles as $article) {
            $nombreArticles += $article->getQuantite();
            $prixTotal += $article->getQuantite() * $article->getLivreAssocie()->getPrixCan();
        }

        $tDonnees = array("titrePage"=>"Mon panier", "action"=>"panier", "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
        echo App::getBlade()->run("paniers.panier",$tDonnees);
    }

    public function modifier():void
    {
        $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['livre_id']));
        $ancienArticle->setQuantite(intval($_POST['quantite']));
        $ancienArticle->mettreAJour();
        header('Location: index.php?controleur=panier&action=panier');
    }

    public function supprimer():void
    {
        $ancienArticle = Article::trouverParId(intval($_POST['id']));
        $ancienArticle->supprimer();
        header('Location: index.php?controleur=panier&action=panier');
    }
}