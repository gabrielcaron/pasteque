<?php
declare(strict_types=1);
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
        return $this->$this->prenom;
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

    /** Méthode pour trouver tous les champs du compte
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
    public static function trouverParCourriel($courriel):Compte
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM `comptes` WHERE courriel = :courriel';
        // Préparer la requête (optimisation)

        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':courriel', $courriel, PDO::PARAM_STR); // validation => Sécurité
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Compte');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }

    public static function courrielValide($courriel): bool
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT COUNT(1) AS courrielCount FROM `comptes` WHERE courriel = :courriel';
        // Préparer la requête (optimisation)

        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':courriel', $courriel, PDO::PARAM_STR); // validation => Sécurité
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result =  $requetePreparee->fetch();
        return ((int)$result->courrielCount) === 0;
    }

    public function inserer():void{
        // Définir la chaine SQL
        $chaineSQL = "INSERT INTO comptes (prenom, nom, courriel, mot_de_passe, panier_id) VALUE (:prenom, :nom, :courriel, :mot_de_passe, :panier_id)";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':prenom', $this->prenom, PDO::PARAM_STR); // validation => Sécurité
        $requetePreparee->bindParam(':nom', $this->nom, PDO::PARAM_STR); // validation => Sécurité
        $requetePreparee->bindParam(':courriel', $this->courriel, PDO::PARAM_STR); // validation => Sécurité
        $requetePreparee->bindParam(':mot_de_passe', $this->mot_de_passe, PDO::PARAM_STR); // validation => Sécurité
        $requetePreparee->bindParam(':panier_id', $this->panier_id, PDO::PARAM_INT); // validation => Sécurité

        // Exécuter la requête
        $requetePreparee->execute();
    }
}