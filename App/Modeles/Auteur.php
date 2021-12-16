<?php
/**
 * @file Classe qui sert à instancier les auteurs
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Auteur == un enregistrement dans la table auteurs
namespace App\Modeles;

use App\App;
use \PDO;
class Auteur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $notice;
    private string $site_web;

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

    // $prenom : Getter et setter
    public function getPrenom():string {
        return $this->prenom;
    }
    public function setPrenom(string $unPrenom):void {
        $this->prenom = $unPrenom;
    }

    // $notice : Getter et setter
    public function getNotice():string {
        return $this->notice;
    }
    public function setNotice(string $unNotice):void {
        $this->notice = $unNotice;
    }

    // $siteWeb : Getter et setter
    public function getSiteWeb():string {
        return $this->site_web;
    }
    public function setSiteWeb(string $unSiteWeb):void {
        $this->site_web = $unSiteWeb;
    }

    /**
     * Méthode pour retourner les livres associés à un auteur
     * @return array - Tableau des livres
    */
    public function getLivresAssocies():array{
        return Livre::trouverLivresParAuteur($this->id);
    }

    /**
     * Méthode pour trouver tous les auteurs
     * @param string $trierPar - Chaine par quoi trier les auteurs
     * @param int $enregistrementDepart - Nombre de départ
     * @param int $nbAuteursParPage - Nombre d'auteurs par page
     * @return array - Tableau des auteurs
     */
    public static function trouverTout(string $trierPar, int $enregistrementDepart, int $nbAuteursParPage):array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * 
                        FROM auteurs
                        ORDER BY
                                case when :trierPar = \'auteurs.nomA\' then auteurs.nom end ASC,
                                case when :trierPar = \'auteurs.nomD\' then auteurs.nom end DESC
                        LIMIT :enregistrementDepart, :nbAuteursParPage';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':enregistrementDepart', $enregistrementDepart, PDO::PARAM_INT);
        $requetePreparee->bindParam(':nbAuteursParPage', $nbAuteursParPage, PDO::PARAM_INT);
        $requetePreparee->bindParam(':trierPar', $trierPar, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver le nombre d'auteur
     * @return string - Nombre de d'auteurs
     */
    public static function trouverNombreAuteurs():string {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT count(id) AS nombreAuteurs FROM auteurs';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $resultat = $requetePreparee->fetch();
        return $resultat->nombreAuteurs;
    }

    /**
     * Méthode pour trouver un seul auteur
     * @param int $unIdAuteur - Id d'un auteur
     * @return Auteur - Un auteur
     */
    public static function trouverParId(int $unIdAuteur):Auteur {
        // Définir la chaine SQL
        $chaineSQL = "SELECT  *
        FROM `auteurs` 
        WHERE auteurs.id = :unIdAuteur";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':unIdAuteur', $unIdAuteur, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        return $requetePreparee->fetch();
    }

    /**
     * Méthode pour trouver tout les auteurs associés à un livre
     * @param int $unIdLivres - Id d'un livre
     * @return array - Tableau des auteurs associés au livre
     */
    public static function trouverParIdLivre(int $unIdLivres):array {
        // Définir la chaine SQL
        $chaineSQL = "SELECT auteurs.* FROM `auteurs` INNER JOIN livres_auteurs ON auteurs.id = livres_auteurs.auteur_id WHERE livres_auteurs.livre_id = :unIdLivres";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':unIdLivres', $unIdLivres, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        return $requetePreparee->fetchAll();
    }
}