<?php
/**
 * @file Classe qui sert à instancier les paniers
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use \PDO;
use app\App;

class Panier
{
    private int $id;
    private string $id_session;
    private int $date_unix_dernier_acces;

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

    // $id_session : Getter et setter
    public function getIdSession():string {
        return $this->id_session;
    }
    public function setIdSession(string $unIdSession):void {
        $this->id_session = $unIdSession;
    }

    // $date_unix_dernier_acces : Getter et setter
    public function getDateUnix():int {
        return $this->date_unix_dernier_acces;
    }
    public function setDateUnix(int $unDateUnix):void {
        $this->date_unix_dernier_acces = $unDateUnix;
    }

    /**
     * Méthode pour trouver les articles associés au panier
     * @return array - Articles associés
     */
    public function getArticlesAssocies():array {
        return Article::trouverParIdPanier($this->id);
    }

    /**
     * Méthode pour trouver tout dans la table paniers
     * @return array - Tableau des paniers
     */
    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers ';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Panier');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver un panier par id
     * @param int $panierChoisi - Un panier id
     * @return Panier - Un panier
     */
    public static function trouverParId(int $panierChoisi):Panier {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers  WHERE id = :panierChoisi';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':panierChoisi', $panierChoisi, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Panier');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }

    /**
     * Méthode pour trouver un panier par session_id
     * @param string $sessionChoisi - Un session_id
     * @return ?Panier - Un panier ou null
     */
    public static function trouverParIdSession(string $sessionChoisi):?Panier {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM paniers  WHERE id_session = :sessionChoisi';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':sessionChoisi', $sessionChoisi, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Panier');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result =  $requetePreparee->fetch();
        return $result === false ? null : $result;
    }

    /**
     * Méthode pour insérer un panier dans la table paniers
     */
    public function inserer():void {
        // Définir la chaine SQL
        $chaineSQL = 'INSERT INTO paniers (id_session, date_unix_dernier_acces) VALUES (:id_session, :date_unix_dernier_acces)';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id_session', $this->id_session, PDO::PARAM_STR);
        $requetePreparee->bindParam(':date_unix_dernier_acces', $this->date_unix_dernier_acces, PDO::PARAM_STR);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour mettre à jour un panier dans la table paniers
     */
    public function mettreAJour():void {
        // Définir la chaine SQL
        $chaineSQL = 'UPDATE paniers SET id_session=:id_session, date_unix_dernier_acces=:date_unix_dernier_acces WHERE id=:id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id', $this->id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':id_session', $this->id_session, PDO::PARAM_STR);
        $requetePreparee->bindParam(':date_unix_dernier_acces', $this->date_unix_dernier_acces, PDO::PARAM_INT);
        // Exécuter la requête
        $requetePreparee->execute();
    }

}
