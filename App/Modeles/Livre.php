<?php
declare(strict_types=1);
// Classe modèle
// Une instance de la classe Participant == un enregistrement dans la table participants
namespace App\Modeles;

use App\App;
use \PDO;

class Livre
{
    private int $id;
    private int $idLivre;
    private string $isbn_papier;
    private string $isbn_pdf;
    private string $isbn_epub;
    private string $url_Audio;
    private string $titre;
    private string $le_livre;
    private string $arguments_commerciaux;
    private int $statut;
    private int $pagination;
    private int $age_min;
    private string $format;
    private int $tirage;
    private float $prix_can;
    private float $prix_euro;
    private string $date_parution_quebec;
    private string $date_parution_france;
    private int $categorie_id;
    private ?int $type_impression_id;
    private ?int $type_couverture_id;

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

    public function getIdLivre(): int
    {
        return $this->idLivre;
    }

    public function setIdLivre(int $unId): void
    {
        $this->idLivre = $unId;
    }

    // $isbn_papier : Getter et setter
    public function getIsbnPapier(): string
    {
        return $this->isbn_papier;
    }

    public function setIsbnPapier(string $isbn): void
    {
        $this->isbn_papier = $isbn;
    }

    // $isbn_pdf : Getter et setter
    public function getIsbnPdf(): string
    {
        return $this->isbn_pdf;
    }

    public function setIsbnPdf(string $isbn): void
    {
        $this->isbn_pdf = $isbn;
    }

    // $isbn_epub : Getter et setter
    public function getIsbnEpub(): string
    {
        return $this->isbn_epub;
    }

    public function setIsbnEpub(string $isbn): void
    {
        $this->isbn_epub = $isbn;
    }

    // $url_Audio : Getter et setter
    public function getUrlAudio(): string
    {
        return $this->url_Audio;
    }

    public function setUrlAudio(string $unUrl): void
    {
        $this->url_Audio = $unUrl;
    }

    // $titre : Getter et setter
    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $unTitre): void
    {
        $this->titre = $unTitre;
    }

    // $le_livre : Getter et setter
    public function getLeLivre(): string
    {
        return $this->le_livre;
    }

    public function setLeLivre(string $unLeLivre): void
    {
        $this->le_livre = $unLeLivre;
    }

    // $arguments_commerciaux : Getter et setter
    public function getArgumentsCommerciaux(): string
    {
        return $this->arguments_commerciaux;
    }

    public function setArgumentsCommerciaux(string $unArgumentsCommerciaux): void
    {
        $this->arguments_commerciaux = $unArgumentsCommerciaux;
    }

    // $statut : Getter et setter
    public function getStatut(): int
    {
        return $this->statut;
    }

    public function setStatut(int $unStatut): void
    {
        $this->statut = $unStatut;
    }

    // $pagination : Getter et setter
    public function getPagination(): int
    {
        return $this->pagination;
    }

    public function setPagination(int $unPagination): void
    {
        $this->pagination = $unPagination;
    }

    // $age_min : Getter et setter
    public function getAgeMin(): int
    {
        return $this->age_min;
    }

    public function setAgeMin(int $unAgeMin): void
    {
        $this->age_min = $unAgeMin;
    }

    // $format : Getter et setter
    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $unFormat): void
    {
        $this->format = $unFormat;
    }

    // $tirage : Getter et setter
    public function getTirage(): int
    {
        return $this->tirage;
    }

    public function setTirage(int $unTirage): void
    {
        $this->tirage = $unTirage;
    }

    // $prix_can : Getter et setter
    public function getPrixCan(): float
    {
        return $this->prix_can;
    }

    public function setPrixCan(float $unPrixCan): void
    {
        $this->prix_can = $unPrixCan;
    }

    // $prix_euro : Getter et setter
    public function getPrixEuro(): float
    {
        return $this->prix_euro;
    }

    public function setPrixEuro(float $unPrixEuro): void
    {
        $this->prix_euro = $unPrixEuro;
    }

    // $date_parution_quebec : Getter et setter
    public function getDateParutionQuebec(): string
    {
        return $this->date_parution_quebec;
    }

    public function setDateParutionQuebec(string $unParutionQuebec): void
    {
        $this->date_parution_quebec = $unParutionQuebec;
    }

    // $date_parution_france : Getter et setter
    public function getDateParutionFrance(): string
    {
        return $this->date_parution_france;
    }

    public function setDateParutionFrance(string $unParutionFrance): void
    {
        $this->date_parution_france = $unParutionFrance;
    }

    // $categorie_id : Getter et setter
    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }

    public function setCategorieId(int $unCategorieId): void
    {
        $this->categorie_id = $unCategorieId;
    }

    // $type_impression_id : Getter et setter
    public function getTypeImpressionId(): int
    {
        return $this->type_impression_id;
    }

    public function setTypeImpressionId(int $unTypeImpressionId): void
    {
        $this->type_impression_id = $unTypeImpressionId;
    }

    // $type_couverture_id : Getter et setter
    public function getTypeCouvertureId(): int
    {
        return $this->type_couverture_id;
    }

    public function setTypeCouvertureId(int $unTypeCouvertureId): void
    {
        $this->type_couverture_id = $unTypeCouvertureId;
    }


    public function getCategorieAssocie(): Categorie
    {
        return Categorie::trouverParId($this->categorie_id);
    }

    public function getAuteurAssocie(): array
    {
        return Auteur::trouverParIdLivre($this->id);
    }

    public function getReconnaissanceAssocie(): array|false
    {
        return Reconnaissance::trouverParId($this->id);
    }


    public static function trouverTout(): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT livres.*
                            FROM livres
                            INNER JOIN categories ON categories.id = categorie_id
                            INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
                            INNER JOIN auteurs ON auteurs.id = livres_auteurs.auteur_id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livres = $requetePreparee->fetchAll();
        //var_dump($livres);

        return $livres;
    }

    public static function trouverToutSansCategories($trierPar, $enregistrementDepart, $nombreLivreParPage): array
    {
        /* Message à Michelle 3 novembre 2021 :
        Je dois faire l'affichage du INNER JOIN et ORDER BY seulement lorsque je trie par auteur, sinon il y a des doublons (nous en avions discuté ensemble) */
        $innerJoin = $trierPar==='auteurs.nomA'||$trierPar==='auteurs.nomD' ? 'INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id INNER JOIN auteurs ON auteurs.id = livres_auteurs.auteur_id': '';
        $orderBy = $trierPar==='auteurs.nomA'||$trierPar==='auteurs.nomD' ? 'case when :trierPar = \'auteurs.nomA\' then auteurs.nom end ASC, case when :trierPar = \'auteurs.nomD\' then auteurs.nom end DESC,': '';


        $chaineSQL = 'SELECT livres.*
                            FROM livres
                            INNER JOIN categories ON categories.id = livres.categorie_id
                            '. $innerJoin .'
                            ORDER BY 
                                     '. $orderBy .'
                                     case when :trierPar = \'categories.nomA\' then categories.nom end ASC,
                                     case when :trierPar = \'categories.nomD\' then categories.nom end DESC,
                                     case when :trierPar = \'livres.titreA\' then livres.titre end ASC,
                                     case when :trierPar = \'livres.titreD\' then livres.titre end DESC,
                                     case when :trierPar = \'statutA\' then statut end ASC,
                                     case when :trierPar = \'statutD\' then statut end DESC
                            LIMIT :enregistrementDepart, :nombreLivreParPage';
        //ORDER BY :ordre :ascOuDesc
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':enregistrementDepart', $enregistrementDepart, PDO::PARAM_INT);
        $requetePreparee->bindParam(':nombreLivreParPage', $nombreLivreParPage, PDO::PARAM_INT);
        $requetePreparee->bindParam(':trierPar', $trierPar, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $resultat = $requetePreparee->fetchAll();

        return $resultat;
    }

    public static function trouverParId(int $idLivre): Livre
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM livres  WHERE id = :idLivre';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':idLivre', $idLivre, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livre = $requetePreparee->fetch();
        return $livre;
    }

    public static function trouverNombreLivres(): string
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT count(id) AS nombreLivres FROM livres';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $resultat = $requetePreparee->fetch();
        return $resultat->nombreLivres;
    }

    public static function trouverNombreLivresAvecCategories($idCategories): string
    {
        /* Message à Michelle 29 ooctobre 2021 :
        Impossibilité d'utiliser un paramètre pour la chaine $categories contenant le séparateur ',' */
        $categories = implode(', ', $idCategories);

        // Définir la chaine SQL
        $chaineSQL = 'SELECT count(id) AS nombreLivres FROM livres WHERE categorie_id IN ('. $categories .')';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        //$requetePreparee->bindParam(':categoriesSelect', $categories, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $resultat = $requetePreparee->fetch();
        return $resultat->nombreLivres;
    }

    public static function trouverLivresParCategories($idCategories, $trierPar, $enregistrementDepart, $nombreLivreParPage): array
    {
        /* Message à Michelle 29 ooctobre 2021 :
        Impossibilité d'utiliser un paramètre pour la chaine $categories contenant le séparateur ',' */
        $categories = implode(', ', $idCategories);

        /* Message à Michelle 3 novembre 2021 :
        Je dois faire l'affichage du INNER JOIN et ORDER BY seulement lorsque je trie par auteur, sinon il y a des doublons (nous en avions discuté ensemble) */
        $innerJoin = $trierPar==='auteurs.nomA'||$trierPar==='auteurs.nomD' ? 'INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id INNER JOIN auteurs ON auteurs.id = livres_auteurs.auteur_id': '';
        $orderBy = $trierPar==='auteurs.nomA'||$trierPar==='auteurs.nomD' ? 'case when :trierPar = \'auteurs.nomA\' then auteurs.nom end ASC, case when :trierPar = \'auteurs.nomD\' then auteurs.nom end DESC,': '';

        // Définir la chaine SQL
        $chaineSQL = 'SELECT livres.*
                            FROM livres
                            INNER JOIN categories ON categories.id = livres.categorie_id 
                            '. $innerJoin .'
                            WHERE categories.id IN ('. $categories .')
                            ORDER BY 
                                     '. $orderBy .'
                                     case when :trierPar = \'categories.nomA\' then categories.nom end ASC,
                                     case when :trierPar = \'categories.nomD\' then categories.nom end DESC,
                                     case when :trierPar = \'livres.titreA\' then livres.titre end ASC,
                                     case when :trierPar = \'livres.titreD\' then livres.titre end DESC,
                                     case when :trierPar = \'statutA\' then statut end ASC,
                                     case when :trierPar = \'statutD\' then statut end DESC
                            LIMIT :enregistrementDepart, :nombreLivreParPage';
        //ORDER BY :ordre :ascOuDesc
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':enregistrementDepart', $enregistrementDepart, PDO::PARAM_INT);
        $requetePreparee->bindParam(':nombreLivreParPage', $nombreLivreParPage, PDO::PARAM_INT);
        //$requetePreparee->bindParam(':categoriesSelect', $categories, PDO::PARAM_STR);
        $requetePreparee->bindParam(':trierPar', $trierPar, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $resultat = $requetePreparee->fetchAll();

        return $resultat;
    }

    public static function trouverLivresParAuteur(int $unIdAuteur): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT *
                        FROM livres
                        INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
                        WHERE livres_auteurs.auteur_id = :unIdAuteur
                        LIMIT 4';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':unIdAuteur', $unIdAuteur, PDO::PARAM_INT);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livres = $requetePreparee->fetchAll();
        //var_dump($participants);
        return $livres;
    }

    public static function trouverNouveautesHasard($combien): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT DISTINCT *, livres.id AS idLivre, categories.nom AS categorieNom, auteurs.nom AS auteurNom
                            FROM livres
                            INNER JOIN categories ON categories.id = categorie_id
                            INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
                            INNER JOIN auteurs ON auteurs.id = livres_auteurs.auteur_id
                            WHERE statut = 2
                            ORDER BY RAND() LIMIT ' . $combien;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }

    public static function trouverAParaitreHasard($combien): array
    {
        // Définir la chaine SQL
        $chaineSQL = 'SELECT DISTINCT *, livres.id AS idLivre, categories.nom AS categorieNom, auteurs.nom AS auteurNom
                            FROM livres
                            INNER JOIN categories ON categories.id = categorie_id
                            INNER JOIN livres_auteurs ON livres.id = livres_auteurs.livre_id
                            INNER JOIN auteurs ON auteurs.id = livres_auteurs.auteur_id
                            WHERE statut = 3
                            ORDER BY RAND() LIMIT ' . $combien;
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Livre');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $livres = $requetePreparee->fetchAll();

        return $livres;
    }


}
