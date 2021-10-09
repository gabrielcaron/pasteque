<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use App\App;
use \PDO;


class Reconnaissance
{
    private int $id;
    private string $la_reconnaissance;
    private int $livre_id;

    public function __construct() {
        //vide
    }
    public function getId():int {
        return $this->id;
    }
    public function setId(int $unId):void {
        $this->id = $unId;
    }

    // $reconnaissance : Getter et setter
    public function getReconnaissance():string {
        return $this->la_reconnaissance;
    }
    public function setReconnaissance(string $unReconnaissance):void {
        $this->la_reconnaissance = $unReconnaissance;
    }

    // $livreId : Getter et setter
    public function getLivreId():int {
        return $this->livre_id;
    }
    public function setLivreId(int $unLivreId):void {
        $this->livre_id = $unLivreId;
    }

    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM reconnaissances';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Reconnaissance');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $reconnaissances = $requetePreparee->fetchAll();
        //var_dump($participants);
        return $reconnaissances;
    }

    public static function trouverParId(int $idLivre):Array|false {

        // Définir la chaine SQL
        $chaineSQL = "SELECT  *
        FROM `reconnaissances` 
        WHERE livre_id = :idLivre";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':idLivre', $idLivre, PDO::PARAM_INT); // validation => Sécurité
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Reconnaissance');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $reconnaissances = $requetePreparee->fetchAll();
        return $reconnaissances;

    }
}