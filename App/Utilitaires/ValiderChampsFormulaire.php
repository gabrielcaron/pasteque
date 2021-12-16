<?php
/**
 * @file Classe qui sert à instancier la validation des champs de formulaire
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);
// Classe utilitaire
namespace App\Utilitaires;

use App\App;
use App\Modeles\Compte;

class ValiderChampsFormulaire
{
    public function __construct()
    {
        // Constructeur vide
    }

    /**
     * Méthode pour valider si un champ est vide
     * @param string $unChamp - Le champ à valider
     * @return bool - True ou false si le champ n'est pas vide
    */
    public static function verifierSiChampVide(string $unChamp):bool{
        return !($unChamp === '');
    }

    /**
     * Méthode pour valider si un champ respecte le regex
     * @param string $unRegex - Le regex pour la validation
     * @param string $unValueChamp - Le champ à valider
     * @return bool - True ou false si le champ respectent le regex
     */
    public static function validerChampRegex(string $unRegex, string $unValueChamp):bool {
        return preg_match($unRegex, $unValueChamp) === 1;
    }

    /**
     * Méthode pour valider tous les champs d'un formulaire à partir d'un json
     * @param array $tMessagesJson - Le tableau json à valider
     * @return array - Tableau des résultats de la vérification contenant : Le message (si erreur), la valeur du champ et s'il est valide
     */
    public static function validerFormulaire(array $tMessagesJson):array{
        $tDonnes = [];
        foreach (array_keys($tMessagesJson) as $champValider) {
            if (isset($_POST[$champValider])) {
                $champTrim = trim($_POST[$champValider]);
                if ($tMessagesJson[$champValider]['vide'] !== '' && ValiderChampsFormulaire::verifierSiChampVide($champTrim)===false) {
                    $tDonnes[$champValider] = ['valeur'=>$champTrim, 'valide'=>false, 'message'=>$tMessagesJson[$champValider]['vide']];
                }
                else if ($tMessagesJson[$champValider]['pattern'] !== '' && ValiderChampsFormulaire::validerChampRegex($tMessagesJson[$champValider]['regex'], $champTrim)===false) {
                    $tDonnes[$champValider] = ['valeur'=>$champTrim, 'valide'=>false, 'message'=>$tMessagesJson[$champValider]['pattern']];
                }
                else if($champValider === 'courriel' && Compte::courrielValide($_POST[$champValider]) === false){
                    $tDonnes[$champValider] = ['valeur' => $_POST[$champValider], 'valide'=>false, 'message'=>$tMessagesJson[$champValider]['disponible']];
                }
                else {
                    $tDonnes[$champValider] = ['valeur'=>$champTrim, 'valide'=>true, 'message'=>''];
                }
            } elseif ($tMessagesJson[$champValider]['vide'] !== '') {
                $tDonnes[$champValider] = ['valeur'=>'off', 'valide'=>false, 'message'=>$tMessagesJson[$champValider]['vide']];
            }
            else {
                $tDonnes[$champValider] = ['valeur'=>'', 'valide'=>true, 'message'=>$tMessagesJson[$champValider]['vide']];
            }
        }
        return $tDonnes;
    }

    /**
     * Méthode pour valider les données d'un tableau pour voir s'il y a des erreurs dans le formualire
     * @param array $tDonnes - Le tableau à valider
     * @return array - Tableau des erreurs contenant true ou false si erreurs
     */
    public static function verifierErreurFormulaire(array $tDonnes):array{
        $tableauErreur = [];
        foreach ($tDonnes as $champ){
            $champ['valide'] === false ? array_push($tableauErreur, false) : array_push($tableauErreur, true);
        }
        return $tableauErreur;
    }
}