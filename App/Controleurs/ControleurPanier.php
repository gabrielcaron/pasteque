<?php
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

        /** Ne pas oublier de mettre le panier id dans la commande. **/
        /* session_regenerate_id();
        $panier = Panier::trouverParIdSession(session_id());
        $compteModifierPanier = Compte::trouverParId();
        $compteModifierPanier->getNom();
        $compteModifierPanier->getPrenom();
        $compteModifierPanier->getCourriel();
        $compteModifierPanier->getMotDePasse();
        $compteModifierPanier->setPanierId($panier->getId());
        $compteModifierPanier->mettreAJour();*/

//        var_dump($panier);
        $articles = $panier->getArticlesAssocies();
        $prixTotal = 0;
        $nombreArticles = 0;
        foreach ($articles as $article) {
            $nombreArticles += $article->getQuantite();
            $prixTotal += $article->getQuantite() * $article->getLivreAssocie()->getPrixCan();
        }

        $commande = $compte->getCommandesAssocies();
//        var_dump($commande);
//        $livraison = $commande->getLivraisonAdresseAssocie();
//        $facturation = $commande->getFacturationAdresseAssocie();
//        $paiement = $commande->getPaiementAssocie();



        $tDonnees = array("titrePage"=>"Commande confirmée", "action"=>"panier", "panier"=>$panier, "prixTotal"=>$prixTotal, "nombreArticles"=>$nombreArticles);
        echo App::getBlade()->run("paniers.confirmation",$tDonnees);
    }
}
