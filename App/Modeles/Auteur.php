<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
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
    public function getLivresAssocies():array|false{
        return Livre::trouverLivresParAuteur($this->id);
    }


    public static function trouverTout():array {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM auteurs';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $auteurs = $requetePreparee->fetchAll();
        //var_dump($participants);
        return $auteurs;
    }

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

    public static function trouverParId(int $unIdAuteur):Auteur {

        // Définir la chaine SQL
        $chaineSQL = "SELECT  *
        FROM `auteurs` 
        WHERE auteurs.id = :unIdAuteur";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':unIdAuteur', $unIdAuteur, PDO::PARAM_INT); // validation => Sécurité
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteur = $requetePreparee->fetch();

        return $auteur;
    }
    public static function trouverParIdLivre(int $unIdLivres):array {

        // Définir la chaine SQL
        $chaineSQL = "SELECT auteurs.* FROM `auteurs` INNER JOIN livres_auteurs ON auteurs.id = livres_auteurs.auteur_id WHERE livres_auteurs.livre_id = :unIdLivres";
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':unIdLivres', $unIdLivres, PDO::PARAM_INT); // validation => Sécurité
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Auteur');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer le résultat
        $auteur = $requetePreparee->fetchAll();

        return $auteur;
    }
}