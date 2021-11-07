<?php

namespace App\Modeles;

use App\App;
use \PDO;

class Evenement
{
    private int $id;
    private string $titre;
    private string $l_evenement;
    private string $date;
    private int $galerie_boutique;
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

    // $l_evenement : Getter et setter
    public function getlEvenement(): string
    {
        return $this->l_evenement;
    }

    public function setlEvenement(int $unEvenement): void
    {
        $this->l_evenement = $unEvenement;
    }

    // $date : Getter et setter
    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $unDate): void
    {
        $this->date = $unDate;
    }

    // $galerie_boutique : Getter et setter
    public function getGalerieBoutique(): int
    {
        return $this->galerie_boutique;
    }

    public function setGalerieBoutique(int $unGalerieBoutique): void
    {
        $this->galerie_boutique = $unGalerieBoutique;
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
        $evenement = $this->l_evenement;
        $evenement = explode(". ", $evenement);
        return $evenement[0] . ".";
    }

    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM evenements WHERE date > DATE_SUB(NOW(),INTERVAL 30 DAY) ORDER BY date DESC';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Evenement');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $evenement = $requetePreparee->fetchAll();
        return $evenement;
    }

}
