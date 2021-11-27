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
    public function getAnneExpiration():int {
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
}