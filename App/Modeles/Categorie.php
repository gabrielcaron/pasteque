<?php
/**
 * @file Classe qui sert à instancier les catégories
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Categorie == un enregistrement dans la table categories
namespace App\Modeles;

use App\App;
use \PDO;
class Categorie
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
     * Méthode pour trouver toutes les catégories
     * @return array - Tableau des catégories
     */
    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM categories';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Categorie');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver une catégorie
     * @param int $idCategorie - Id d'une catégorie
     * @return Categorie - Une catégorie
     */
    public static function trouverParId(int $idCategorie):Categorie {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM categories  WHERE id = :idCategorie';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Categorie');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetch();
    }




}