<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use \PDO;
use app\App;
class Paiement
{
    private int $id;
    private string $titulaire;
    private int $numero_carte;
    private int $mois_expiration;
    private int $annee_expiration;
    private int $cvv;

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

    // $titulaire : Getter et setter
    public function getTitulaire():string {
        return $this->titulaire;
    }
    public function setTitulaire(string $unTitulaire):void {
        $this->titulaire = $unTitulaire;
    }

    // $numero_carte : Getter et setter
    public function getNumeroCarte():int {
        return $this->numero_carte;
    }
    public function setNumeroCarte(int $unNumeroCarte):void {
        $this->numero_carte = $unNumeroCarte;
    }

    // $mois_expiration : Getter et setter
    public function getMoisExpiration():int {
        return $this->mois_expiration;
    }
    public function setMoisExpiration(int $unMoisExpiration):void {
        $this->mois_expiration = $unMoisExpiration;
    }

    // $annee_expiration : Getter et setter
    public function getAnneeExpiration():int {
        return $this->annee_expiration;
    }
    public function setAnneeExpiration(int $unAnneeExpiration):void {
        $this->annee_expiration = $unAnneeExpiration;
    }

    // $cvv : Getter et setter
    public function getCvv():int {
        return $this->cvv;
    }
    public function setCvv(int $unCvv):void {
        $this->cvv = $unCvv;
    }


    /**
     * Méthode pour trouver tous les paiements
     * @return array - Tableau des paiements
     */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paiements';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Paiement');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver le paiement avec un id
     * @param int $paiementId - Un paiement id
     * @return ?Paiement - Le paiement
     */
    public static function trouverParId(int $paiementId):?Paiement {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paiements WHERE id = :paiementId';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':paiementId', $paiementId, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Paiement');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        return $result === false ? null : $result;
    }

    /**
     * Méthode pour trouver le paiement id par tout les champs
     * @param string $unTitulaire - Un titulaire
     * @param int $unNumeroCarte - Un numéro de carte
     * @param int $unMoisExpiration - Un mois d'expiration
     * @param int $unAnneeExpiration - Une année d'expiration
     * @param int $unCvv - Un cvv
     * @return string - Le id
     */
    public static function trouverParTousLesChamps(string $unTitulaire, int $unNumeroCarte, int $unMoisExpiration, int $unAnneeExpiration, int $unCvv):string {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT id AS id FROM paiements WHERE titulaire = :titulaire AND numero_carte = :numero_carte AND mois_expiration = :mois_expiration AND annee_expiration = :annee_expiration AND cvv = :cvv';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':titulaire', $unTitulaire, PDO::PARAM_STR);
        $requetePreparee->bindParam(':numero_carte', $unNumeroCarte, PDO::PARAM_INT);
        $requetePreparee->bindParam(':mois_expiration', $unMoisExpiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':annee_expiration', $unAnneeExpiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':cvv', $unCvv, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        return $result->id;
    }

    /**
     * Méthode pour insérer un paiement dans la table adresses
     */
    public function inserer():void {
        // Définir la chaine SQL
        $chaineSQL = 'INSERT INTO paiements (titulaire, numero_carte, mois_expiration, annee_expiration, cvv) VALUES (:titulaire, :numero_carte, :mois_expiration, :annee_expiration, :cvv)';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':titulaire', $this->titulaire, PDO::PARAM_STR);
        $requetePreparee->bindParam(':numero_carte', $this->numero_carte, PDO::PARAM_INT);
        $requetePreparee->bindParam(':mois_expiration', $this->mois_expiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':annee_expiration', $this->annee_expiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':cvv', $this->cvv, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour mettre à jour un paiement dans la table adresses
     */
    public function mettreAJour():void
    {

        // Définir la chaine SQL
        $chaineSQL = 'UPDATE paiements SET titulaire=:titulaire, numero_carte=:numero_carte, mois_expiration=:mois_expiration, annee_expiration=:annee_expiration, cvv=:cvv WHERE id=:id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id', $this->id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':titulaire', $this->titulaire, PDO::PARAM_STR);
        $requetePreparee->bindParam(':numero_carte', $this->numero_carte, PDO::PARAM_INT);
        $requetePreparee->bindParam(':mois_expiration', $this->mois_expiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':annee_expiration', $this->annee_expiration, PDO::PARAM_INT);
        $requetePreparee->bindParam(':cvv', $this->cvv, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }
}