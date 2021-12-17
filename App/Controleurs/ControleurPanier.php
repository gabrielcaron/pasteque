<?php
/**
 * @file Controleur qui sert à gérer les paniers
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
use App\Modeles\Commande;
use App\Modeles\Compte;
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
        $_SESSION['nbItemsPanier'] = $nombreArticles;
        $prixLivraison = $prixTotal > 60 ? 0 : 7;
        $tDonnees = array("titrePage"=>"Mon panier", "action"=>"panier", "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles, "prixLivraison" => $prixLivraison);
        echo App::getBlade()->run("paniers.panier",$tDonnees);
    }

    //Modifier Articles
    public function modifier():void
    {
        $ancienArticle = Article::trouverParIdProduitIdPanier(intval($_POST['panier_id']), intval($_POST['livre_id']));
        $ancienArticle->setQuantite(intval($_POST['quantite']));
        $ancienArticle->mettreAJour();
        header('Location: index.php?controleur=panier&action=panier');
    }

    //Supprimer Article
    public function supprimer():void
    {
        $ancienArticle = Article::trouverParId(intval($_POST['id']));
        $ancienArticle->supprimer();
        header('Location: index.php?controleur=panier&action=panier');
    }

    // Confirmation de la commande du panier
    public function confirmation():void
    {
        $compte = Compte::trouverParCourriel($_SESSION['email']);
        $panier = Panier::trouverParIdSession(session_id());

        $articles = $panier->getArticlesAssocies();
        $prixTotal = 0;
        $nombreArticles = 0;
        foreach ($articles as $article) {
            $nombreArticles += $article->getQuantite();
            $prixTotal += $article->getQuantite() * $article->getLivreAssocie()->getPrixCan();
        }
        $prixLivraison = $prixTotal > 60 ? 0 : 7;
        $commande = $compte->getCommandesAssocies();
        $livraison = $commande->getLivraisonAdresseAssocie();

        $tDonnees = array("titrePage"=>"Commande confirmée", "action"=>"panier", "panier"=>$panier, "prixTotal"=>$prixTotal,
        "nombreArticles"=>$nombreArticles, "commande"=>$commande, "prixLivraison"=>$prixLivraison, "livraison"=>$livraison,
        "compte"=>$compte);
        echo App::getBlade()->run("paniers.confirmation",$tDonnees);
    }
}
