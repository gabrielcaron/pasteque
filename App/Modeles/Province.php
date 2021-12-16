<?php
/**
 * @file Classe qui sert à instancier les provinces
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

use App\App;
use \PDO;

class Province
{
    private int $id;
    private string $nom;


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

    // $nom : Getter et setter
    public function getNom():string {
        return $this->nom;
    }
    public function setNom(string $unNom):void {
        $this->nom = $unNom;
    }

    /**
     * Méthode pour trouver toutes les provinces
     * @return array - Tableau des provinces
     */
    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM provinces';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Province');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        //var_dump($participants);
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver une province
     * @param int $idProvince - Id d'une province
     * @return Province - Une province
     */
    public static function trouverParId(int $idProvince):Province {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM provinces  WHERE id = :idProvince';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':idProvince', $idProvince, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Province');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }




}