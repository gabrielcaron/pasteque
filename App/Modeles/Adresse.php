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

    //Trouver la province associe à un id
    public function getProvinceAssocie():Province {
        return Province::trouverParId($this->province_id);
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
     * Méthode pour trouver 0 à 4 adresses distinctes associées à un compte
     * @param string $livraisonOuFacturation - commandes.livraison_adresse_id ou commandes.facturation_adresse_id
     * @param int $compteId - Un compte id
     * @return array - Tableau des adresses id
     */
    public static function trouverToutAdresseParIdCompte(int $compteId, string $livraisonOuFacturation): array
    {
        /* Message à Michelle 27 novembre 2021 :
        Impossibilité d'utiliser un paramètre (bindParam) pour la chaine $livraisonOuFacturation contenant le séparateur '.' */
        // Définir la chaine SQL
        $chaineSQL = 'SELECT DISTINCT MAX(adresses.id) as id, adresse, ville, province_id, code_postal, MAX(date_unix_commande) 
                        FROM adresses 
                        INNER JOIN commandes ON adresses.id = '.$livraisonOuFacturation.'
                        WHERE compte_id = :compteId 
                        GROUP BY adresse, ville, province_id, code_postal 
                        ORDER BY MAX(date_unix_commande) DESC 
                        LIMIT 0, 4';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        $requetePreparee->bindParam(':compteId', $compteId, PDO::PARAM_INT);
        //$requetePreparee->bindParam(':livraisonOuFacturation', $livraisonOuFacturation, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_CLASS, 'App\Modeles\Adresse');
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        return $requetePreparee->fetchAll();
    }

    /**
     * Méthode pour trouver toutes les adresses avec certains id
     * @return array - Tableau des adresses
     */
    public static function trouverToutParTableauId(array $tableauDeId): array
    {
        /* Message à Michelle 27 novembre 2021 :
        Impossibilité d'utiliser un paramètre (bindParam) pour la chaine $tableauDeId contenant le séparateur ',' */
        $idAdresses = implode(', ', $tableauDeId);
        //var_dump($idAdresses);

        // Définir la chaine SQL
        $chaineSQL = 'SELECT * FROM adresses WHERE id IN ('. $idAdresses .')';
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

    /**
     * Méthode pour trouver l'adresse id par tout les champs
     * @param string $unAdresse - Une adresse
     * @param string $unVille - Une ville
     * @param int $unProvinceId - Une province
     * @param string $unCodePostal - Un code postal
     * @return string - Le id
     */
    public static function trouverParTousLesChamps(string $unAdresse, string $unVille, int $unProvinceId, string $unCodePostal):string {
        //var_dump($unAdresse, $unVille, $unProvinceId, $unCodePostal);
        // Définir la chaine SQL
        $chaineSQL = 'SELECT id AS id FROM adresses WHERE adresse = :adresse AND ville = :ville AND province_id = :province_id AND code_postal = :code_postal';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':adresse', $unAdresse, PDO::PARAM_STR);
        $requetePreparee->bindParam(':ville', $unVille, PDO::PARAM_STR);
        $requetePreparee->bindParam(':province_id', $unProvinceId, PDO::PARAM_INT);
        $requetePreparee->bindParam(':code_postal', $unCodePostal, PDO::PARAM_STR);
        // Définir le mode de récupération
        $requetePreparee->setFetchMode(PDO::FETCH_OBJ);
        // Exécuter la requête
        $requetePreparee->execute();
        // Récupérer une seule occurrence à la fois
        $result = $requetePreparee->fetch();
        //var_dump($result);
        return $result->id;
    }

    /**
     * Méthode pour insérer une adresse dans la table adresses
     */
    public function inserer():void {
        // Définir la chaine SQL
        $chaineSQL = 'INSERT INTO adresses (adresse, ville, province_id, code_postal) VALUES (:adresse, :ville, :province_id, :code_postal)';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':adresse', $this->adresse, PDO::PARAM_STR);
        $requetePreparee->bindParam(':ville', $this->ville, PDO::PARAM_STR);
        $requetePreparee->bindParam(':province_id', $this->province_id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':code_postal', $this->code_postal, PDO::PARAM_STR);
        // Exécuter la requête
        $requetePreparee->execute();
    }

    /**
     * Méthode pour mettre à jour une adresse dans la table adresses
     */
    public function mettreAJour():void
    {
        //var_dump('entre');
        // Définir la chaine SQL
        $chaineSQL = 'UPDATE adresses SET adresse=:adresse, ville=:ville, province_id=:province_id, code_postal=:code_postal WHERE id = :id';
        // Préparer la requête (optimisation)
        $requetePreparee = App::getPDO()->prepare($chaineSQL);
        // Définir la méthode de validation des variables associées aux marqueurs nommés de la requête
        $requetePreparee->bindParam(':id', $this->id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':adresse', $this->adresse, PDO::PARAM_STR);
        $requetePreparee->bindParam(':ville', $this->ville, PDO::PARAM_STR);
        $requetePreparee->bindParam(':province_id', $this->province_id, PDO::PARAM_INT);
        $requetePreparee->bindParam(':code_postal', $this->code_postal, PDO::PARAM_STR);
        // Exécuter la requête
        $requetePreparee->execute();
        //var_dump('id =',$this->id);
    }
}