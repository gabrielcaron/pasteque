<?php
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

    public function getArticlesAssocies():array {
        return Article::trouverParIdPanier($this->id);
    }

    //Trouver tout dans la table paniers
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

    //Trouver dans la table panier par le id d'un panier
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

    //Trouver dans la table paniers par le id d'une categorie
    public static function trouverParIdSession(string $sessionChoisi):Panier|false {
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
        return $requetePreparee->fetch();
    }

    //Inserer dans la table paniers un nouveau panier
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

    //Modifier dans la table paniers un panier
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