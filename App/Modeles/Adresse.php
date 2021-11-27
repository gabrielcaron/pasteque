<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use \PDO;
use app\App;
class Adresse
{
    private int $id;
    private string $adresse;
    private string $ville;
    private int $province_id;
    private string $code_postal;

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

    // $adresse : Getter et setter
    public function getAdresse():string {
        return $this->adresse;
    }
    public function setAdresse(string $adresse):void {
        $this->adresse = $adresse;
    }
    // $ville : Getter et setter
    public function getVille():string {
        return $this->ville;
    }
    public function setVille(string $uneVille):void {
        $this->ville = $uneVille;
    }
    // $province : Getter et setter
    public function getProvinceId():int {
        return $this->province_id;
    }
    public function setProvinceId(int $uneProvinceId):void {
        $this->province_id = $uneProvinceId;
    }
    // $code_postal : Getter et setter
    public function getCodePostal():string {
        return $this->code_postal;
    }
    public function setCodePostal(string $unCodePostal):void {
        $this->code_postal= $unCodePostal;
    }

    /**
     * Méthode pour trouver toutes les adresses
     * @return array - Tableau des adresses
     */
    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM adresses';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Adresse');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver l'adresse par id
     * @param int $adresseId - Un adresse id
     * @return ?Adresse - L'adresse
     */
    public static function trouverParId(int $adresseId):?Adresse {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM adresses WHERE id = :adresseId';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':adresseId', $adresseId, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Adresse');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        return $result === false ? null : $result;
    }
}