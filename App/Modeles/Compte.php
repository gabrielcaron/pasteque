<?php
/**
 * @file Classe qui sert à instancier les comptes
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Compte == un enregistrement dans la table comptes
namespace App\Modeles;

use App\App;
use \PDO;
class Compte
{
    private int $id;
    private string $prenom;
    private string $nom;
    private string $courriel;
    private string $mot_de_passe;
    private int $panier_id;

    public function __construct()
    {
        //vide
    }
    // $id : Getter et setter
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $unId): void
    {
        $this->id = $unId;
    }

    // $prenom : Getter et setter
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $unPrenom): void
    {
        $this->prenom = $unPrenom;
    }

    // $nom : Getter et setter
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $unNom): void
    {
        $this->nom = $unNom;
    }

    // $courriel : Getter et setter
    public function getCourriel(): string
    {
        return $this->courriel;
    }

    public function setCourriel(string $unCourriel): void
    {
        $this->courriel = $unCourriel;
    }

    // $mot_de_passe : Getter et setter
    public function getMotDePasse(): string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $unMotDePasse): void
    {
        $this->mot_de_passe = $unMotDePasse;
    }

    // $panier_id : Getter et setter
    public function getPanierId(): int
    {
        return $this->panier_id;
    }
    public function setPanierId(int $unPanierId): void
    {
        $this->panier_id = $unPanierId;
    }

    /**
     * Méthode pour trouver les commandes associées à un compte
     * @return ?Commande - Commandes associées à un compte
     */
    public function getCommandesAssocies():?Commande
    {
        return Commande::trouverParIdCompte($this->id);
    }

    /**
     * Méthode pour trouver un compte par session_id
     * @param string $sessionChoisi - Un session_id
     * @return ?Compte - Un compte ou null
     */
    public static function trouverParIdSession(string $sessionChoisi):?Compte {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM comptes INNER JOIN paniers ON comptes.panier_id = paniers.id WHERE paniers.id_session = :sessionChoisi';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':sessionChoisi', $sessionChoisi, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Compte');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result= $requetePreparee->fetch();
        return $result === false ? null : $result;
    }

    /**
     * Méthode pour trouver tout de la table comptes
     * @return array - Tableau du compte
     */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM comptes';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Compte');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver tout de la table comptes
     * @param int $unId - Un compte id
     * @return Compte - Tableau du compte
     */
    public static function trouverParId(int $unId): Compte
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM comptes WHERE id = :id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->bindParam(':id', $unId, PDO::PARAM_INT);
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Compte');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }

    /**
     * Méthode pour trouver un compte par courriel
     * @param string $courriel - Un courriel
     * @return ?Compte - Un compte ou null
     */
    public static function trouverParCourriel(string $courriel):?Compte
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM `comptes` WHERE courriel = :courriel';
        // Préparer la requête (optimisation)

        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Compte');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        return $result === false ? null : $result ;
    }

    /**
     * Méthode pour trouver si le courriel est disponible dans la bd
     * @param string $courriel - Un courriel
     * @return bool - True ou false
     */
    public static function courrielValide(string $courriel): bool
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(1) AS courrielCount FROM `comptes` WHERE courriel = :courriel';
        // Préparer la requête (optimisation)

        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result =  $requetePreparee->fetch();
        return ((int)$result->courrielCount) === 0;
    }

    /**
     * Méthode pour insérer un compte dans la table comptes
     * @return void
     */
    public function inserer():void{
        // Définir la chaine SQL
        $chaineSQL = "INSERT INTO comptes (prenom, nom, courriel, mot_de_passe, panier_id) VALUE (:prenom, :nom, :courriel, :mot_de_passe, :panier_id)";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':nom', $this->nom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':courriel', $this->courriel, PDO::PARAM_STR);
        $requetePreparee->bindParam(':mot_de_passe', $this->mot_de_passe, PDO::PARAM_STR);
        $requetePreparee->bindParam(':panier_id', $this->panier_id, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour mettre à jour un compte dans la table comptes
     * @return void
     */
    public function mettreAJour():void {
        // Définir la chaine SQL
        $chaineSQL = 'UPDATE comptes SET prenom=:prenom, nom=:nom, courriel=:courriel, mot_de_passe=:mot_de_passe, panier_id=:panier_id WHERE id = :id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id', $this->id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':nom', $this->nom, PDO::PARAM_STR);
        $requetePreparee->bindParam(':courriel', $this->courriel, PDO::PARAM_STR);
        $requetePreparee->bindParam(':mot_de_passe', $this->mot_de_passe, PDO::PARAM_STR);
        $requetePreparee->bindParam(':panier_id', $this->panier_id, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }
}