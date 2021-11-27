<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use \PDO;
use app\App;
class Commande
{
    private int $id;
    private int $livraison_adresse_id;
    private int $facturation_adresse_id;
    private int $paiement_id;
    private int $compte_id;
    private int $date_unix_commande;

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

    // $livraison_adresse_id : Getter et setter
    public function getLivraisonAdresseId():int {
        return $this->livraison_adresse_id;
    }
    public function setLivraisonAdresseId(int $unLivraisonAdresseId):void {
        $this->livraison_adresse_id = $unLivraisonAdresseId;
    }

    // $facturation_adresse_id : Getter et setter
    public function getFacturationAdresseId():int {
        return $this->facturation_adresse_id;
    }
    public function setFacturationAdresseId(int $unFacturationAdresseId):void {
        $this->facturation_adresse_id = $unFacturationAdresseId;
    }

    // $paiementId : Getter et setter
    public function getPaiementId():int {
        return $this->paiement_id;
    }
    public function setPaiementId(int $unPaiementId):void {
        $this->paiement_id = $unPaiementId;
    }

    // $compte_id : Getter et setter
    public function getCompteId():int {
        return $this->compte_id;
    }
    public function setCompteId(int $unCompteId):void {
        $this->compte_id = $unCompteId;
    }

    // $date_unix_commande : Getter et setter
    public function getDateUnixCommande():int {
        return $this->date_unix_commande;
    }
    public function setDateUnixCommande(int $unDateUnixCommande):void {
        $this->date_unix_commande = $unDateUnixCommande;
    }

    public function getLivraisonAdresseAssocie():Adresse {
        return Adresse::trouverParId($this->livraison_adresse_id);
    }

    public function getFacturationAdresseAssocie():Adresse {
        return Adresse::trouverParId($this->facturation_adresse_id);
    }

    /*// $nombre_commande : Getter et setter
    public function getNombreCommande():int {
        return $this->nombre_commande;
    }
    public function setNombreCommande(int $unNombreCommande):void {
        $this->nombre_commande = $unNombreCommande;
    }*/

    /**
     * Méthode pour trouver toutes les commandes
     * @return array - Tableau des commandes
     */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM commandes';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Commmande');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver toutes les commandes avec un compte id
     * @param int $compteId - Un compte id
     * @return ?Commande - Tableau des commandes
     */
    public static function trouverParIdCompte(int $compteId):?Commande {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM commandes WHERE compte_id = :compteId';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':compteId', $compteId, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Commande');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        return $result === false ? null : $result;
    }
}