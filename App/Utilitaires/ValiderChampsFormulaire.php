<?php
declare(strict_types=1);

namespace App\Utilitaires;

use App\App;
use App\Modeles\Compte;

class ValiderChampsFormulaire
{
    public function __construct()
    {
        // Constructeur vide
    }
    public static function verifierSiChampVide(string $unChamp):bool{
        return !($unChamp === '');
    }
    public static function validerChampRegex($unRegex, $unValueChamp):bool {
        /*$rgx = [
            'prenom'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#',
            'nom'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#',
            'adresse'=>'#^[0-9]+[a-zA-ZÀ-ÿ0-9 \-]+$#',
            'ville'=>'#^[a-zA-ZÀ-ÿ0-9 \-]+$#',
            'pays'=>'',
            'code_postal'=>'#^[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]$#',
            'courriel'=>'#^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$#',
            'connexionEmail'=>'#^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$#',
            'connexionPassword'=>'#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}$#',
            'mot_de_passe'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#'
        ];*/
        return preg_match($unRegex, $unValueChamp) === 1;
    }
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

    public static function verifierErreurFormulaire(array $tDonnes):array{
        $tableauErreur = [];
        foreach ($tDonnes as $champ){
            if($champ['valide'] === false){
                array_push($tableauErreur, false);

            }
            else{
                array_push($tableauErreur, true);
            }
        }
        return $tableauErreur;
    }
}