<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use \PDO;
use app\App;

class Article
{
    private int $id;
    private int $quantite;
    private int $produit_id;
    private int $panier_id;

    public function __construct() {
        //vide
    }

    // $id : Getter et setter
    public function getId():int {
        return $this->id;
    }
    public function setId(int $unId):void {
        $this->id = $unId;
    }

    // $quantite : Getter et setter
    public function getQuantite():int {
        return $this->quantite;
    }
    public function setQuantite(int $unQuantite):void {
        $this->quantite = $unQuantite;
    }

    // $produit_id : Getter et setter
    public function getProduitId():int {
        return $this->produit_id;
    }
    public function setProduitId(int $unIdProduit):void {
        $this->produit_id = $unIdProduit;
    }

    // $panier_id : Getter et setter
    public function getPanierId():int {
        return $this->panier_id;
    }
    public function setPanierId(int $unPanierId):void {
        $this->panier_id = $unPanierId;
    }

    /**
     * Méthode pour trouver le livre associer à l'article
     * @return Livre - Livre associe
     */
    public function getLivreAssocie():Livre {
        return Livre::trouverParId($this->produit_id);
    }

    /**
     * Méthode pour trouver tous les articles
     * @return array - Tableau des articles
     */
    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles ';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver un article par le panier id et le produit id
     * @param int $panierId - Un panier id
     * @param int $produitId - Un produit id
     * @return ?Article - Un Article ou null
     */
    public static function trouverParIdProduitIdPanier(int $panierId, int $produitId): ?Article  {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT articles.* FROM articles WHERE panier_id = :panier_id AND produit_id = :produit_id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':panier_id', $panierId, PDO::PARAM_INT);
        $requetePreparee->bindParam(':produit_id', $produitId, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $request = $requetePreparee->fetch();
        return $request === false ? null : $request;
    }

    /**
     * Méthode pour trouver un article par id
     * @param int $articleChoisi - Un article id
     * @return Article - Un Article
     */
    public static function trouverParId(int $articleChoisi):Article {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles  WHERE id = :articleChoisi';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':articleChoisi', $articleChoisi, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }

    /**
     * Méthode pour trouver les articles par panier id
     * @param int $panierChoisi - Un panier id
     * @return array - Tableau des articles
     */
    public static function trouverParIdPanier(int $panierChoisi):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM articles  WHERE panier_id = :panierChoisi';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':panierChoisi', $panierChoisi, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Article');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour insérer un article dans la table articles
     */
    public function inserer():void {
        // Définir la chaine SQL
        $chaineSQL = 'INSERT INTO articles (produit_id, quantite, panier_id) VALUES (:produit_id, :quantite, :panier_id)';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':produit_id', $this->produit_id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':quantite', $this->quantite, PDO::PARAM_INT);
        $requetePreparee->bindParam(':panier_id', $this->panier_id, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour mettre à jour un article dans la table articles
     */
    public function mettreAJour():void {

        // Définir la chaine SQL
        $chaineSQL = 'UPDATE articles SET produit_id=:produit_id, quantite=:quantite, panier_id=:panier_id WHERE produit_id=:produit_id AND panier_id=:panier_id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':produit_id', $this->produit_id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':quantite', $this->quantite, PDO::PARAM_INT);
        $requetePreparee->bindParam(':panier_id', $this->panier_id, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour supprimer un article dans la table articles
     */
    public function supprimer():void {
        // Définir la chaine SQL
        $chaineSQL = 'DELETE FROM articles  WHERE id=:id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id', $this->id, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

}
