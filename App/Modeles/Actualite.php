<?php

namespace App\Modeles;

use App\App;
use \PDO;

class Actualite
{
    private int $id;
    private string $titre;
    private string $l_actualite;
    private string $date;
    private string $lien_facebook;
    private string $lien_instagram;

    public function __construct()
    {
        //vide
    }

    // $id : Getter et setter
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $unId): void
    {
        $this->id = $unId;
    }

    // $titre : Getter et setter
    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(int $unTitre): void
    {
        $this->titre = $unTitre;
    }

    // $l_actualite : Getter et setter
    public function getlActualite(): string
    {
        return $this->l_actualite;
    }

    public function setlActualite(int $uneActualite): void
    {
        $this->l_actualite = $uneActualite;
    }

    // $date : Getter et setter
    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(int $uneDate): void
    {
        $this->date = $uneDate;
    }

    // $lien_facebook : Getter et setter
    public function getLienFacebook(): string
    {
        return $this->lien_facebook;
    }

    public function setLienFacebook(int $unLienFacebook): void
    {
        $this->lien_facebook = $unLienFacebook;
    }

    // $lien_instagram : Getter et setter
    public function getLienInstagram(): string
    {
        return $this->lien_instagram;
    }

    public function setLienInstagram(int $unLienInstagram): void
    {
        $this->lien_instagram = $unLienInstagram;
    }

    public function getIntro()
    {
        $actualite = $this->l_actualite;
        $actualite = explode("! ", $actualite);
        return $actualite[0] . ".";
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM actualites WHERE date > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY date DESC';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Actualite');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livres = $requetePreparee->fetchAll();
        return $livres;
    }



}
